<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-forms.input-label for="name" :value="__('Benutzername')" />
            <x-forms.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-forms.input-label for="email" :value="__('E-Mail Adresse')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Passwort')" />

            <x-forms.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" :value="__('Passwort bestätigen')" />

            <x-forms.text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-start mt-10">
            <x-buttons.primary-button>
                {{ __('Registrieren') }}
            </x-buttons.primary-button>

            <x-buttons.secondary-button class="ms-2">
                <a class="normal text-white" href="{{ route('login') }}">
                    {{ __('Bereits registriert?') }}
                </a>
            </x-buttons.secondary-button>
        </div>
    </form>
</x-guest-layout>