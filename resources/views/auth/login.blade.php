<x-guest-layout>
    <!-- Session Status -->
    <x-forms.auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Addresse -->
        <div>
            <x-forms.input-label for="email" :value="__('E-Mail Adresse')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Passwort -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Dein Passwort')" />

            <x-forms.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Angemeldet bleiben -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Angemeldet bleiben') }}</span>
            </label>
        </div>

        <div class="flex items-start justify-start mt-10">
            <x-buttons.primary-button>
                {{ __('Anmelden') }}
            </x-buttons.primary-button>
            @if (Route::has('password.request'))
                <x-buttons.secondary-button class="ml-2">
                    <a class="normal text-white" href="{{ route('password.request') }}">
                        {{ __('Passwort vergessen?') }}
                    </a>
                </x-buttons.secondary-button>
            @endif
        </div>

        <div class="mt-4">
            <x-buttons.secondary-button type="button" variant="white"
                onclick="window.location='{{ route('social.redirect', ['provider' => 'google']) }}'">
                <span class="inline-flex items-center justify-center gap-2">
                    <i class="fa-brands fa-google" aria-hidden="true"></i>
                    <span>{{ __('Mit Google anmelden') }}</span>
                </span>
            </x-buttons.secondary-button>
        </div>

        <div class="mt-2">
            <x-buttons.secondary-button type="button" variant="black"
                onclick="window.location='{{ route('social.redirect', ['provider' => 'github']) }}'">
                <span class="inline-flex items-center justify-center gap-2">
                    <i class="fa-brands fa-github" aria-hidden="true"></i>
                    <span>{{ __('Mit GitHub anmelden') }}</span>
                </span>
            </x-buttons.secondary-button>
        </div>

    </form>
</x-guest-layout>