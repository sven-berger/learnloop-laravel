<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
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

        $oauthUser = Socialite::driver($provider)->user();

        $email = $oauthUser->getEmail();
        abort_unless(is_string($email) && $email !== '', 422, ucfirst($provider) . ' hat keine E-Mail-Adresse zurückgegeben.');

        $providerId = $oauthUser->getId();
        abort_unless(is_string($providerId) && $providerId !== '', 422, ucfirst($provider) . ' hat keine Nutzer-ID zurückgegeben.');

        // Merge-Flow: User mit Social-ID oder E-Mail suchen
        $user = User::query()
            ->where($providerColumn, $providerId)
            ->orWhere('email', $email)
            ->first();

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
