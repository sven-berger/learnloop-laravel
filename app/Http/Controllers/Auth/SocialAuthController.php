<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialAuthController extends Controller
{
    /**
     * Keep this list small on purpose (avoid accidentally exposing providers).
     */
    private const SUPPORTED_PROVIDERS = ['google', 'github'];

    private function providerColumn(string $provider): string
    {
        return match ($provider) {
            'google' => 'google_id',
            'github' => 'github_id',
            default => '',
        };
    }

    public function redirect(string $provider): SymfonyRedirectResponse
    {
        abort_unless(in_array($provider, self::SUPPORTED_PROVIDERS, true), 404);

        $driver = Socialite::driver($provider);

        if ($provider === 'github' && $driver instanceof AbstractProvider) {
            $driver->scopes(['user:email']);
        }

        return $driver->redirect();
    }

    public function callback(string $provider): RedirectResponse
    {
        abort_unless(in_array($provider, self::SUPPORTED_PROVIDERS, true), 404);

        $providerColumn = $this->providerColumn($provider);
        abort_unless($providerColumn !== '', 404);

        $driver = Socialite::driver($provider);
        if ($provider === 'github' && $driver instanceof AbstractProvider) {
            $driver->scopes(['user:email']);
        }

        $oauthUser = $driver->user();

        $providerId = $oauthUser->getId();

        if (!is_string($providerId) || $providerId === '') {
            $raw = method_exists($oauthUser, 'getRaw') ? $oauthUser->getRaw() : [];

            $providerId = match (true) {
                isset($raw['id']) && $raw['id'] !== '' => (string) $raw['id'],
                isset($raw['node_id']) && $raw['node_id'] !== '' => 'node:' . (string) $raw['node_id'],
                isset($raw['login']) && $raw['login'] !== '' => 'login:' . (string) $raw['login'],
                default => '',
            };

            if ($providerId !== '') {
                Log::notice('OAuth-ID über Raw-Fallback ermittelt.', [
                    'provider' => $provider,
                    'provider_id' => $providerId,
                ]);
            }
        }

        abort_unless(is_string($providerId) && $providerId !== '', 422, ucfirst($provider) . ' hat keine Nutzer-ID zurückgegeben.');

        $email = $oauthUser->getEmail();
        $email = is_string($email) && $email !== '' ? $email : null;

        // Merge-Flow: zuerst sicher per Social-ID matchen
        $user = User::query()
            ->where($providerColumn, $providerId)
            ->first();

        if (!$user && $email !== null) {
            $user = User::query()->where('email', $email)->first();
        }

        if ($email === null && $provider === 'github') {
            $email = $providerId . '@users.noreply.github.local';

            Log::notice('GitHub OAuth ohne E-Mail-Adresse, verwende Fallback-Mail.', [
                'provider' => $provider,
                'provider_id' => $providerId,
                'fallback_email' => $email,
            ]);
        }

        abort_unless($email !== null, 422, ucfirst($provider) . ' hat keine E-Mail-Adresse zurückgegeben.');

        if (!$user) {
            // Neuer User, falls weder Social-ID noch E-Mail existiert
            $user = User::query()->create([
                'name' => $oauthUser->getName() ?: ($oauthUser->getNickname() ?: ucfirst($provider) . ' User'),
                'email' => $email,
                'password' => Hash::make(Str::random(64)),
                'email_verified_at' => now(),
                $providerColumn => $providerId,
            ]);
        } else {
            // Social-ID ggf. ergänzen
            if (($user->{$providerColumn} ?? null) === null || ($user->{$providerColumn} ?? '') === '') {
                $user->forceFill([$providerColumn => $providerId])->save();
            }
        }

        Auth::login($user);
        request()->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
