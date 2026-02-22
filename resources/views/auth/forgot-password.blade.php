<x-guest-layout>
    <p class="mb-10">
        {!! __('Du hast dein Passwort vergessen?<br /> Kein Problem. Gib einfach deine E-Mail-Adresse ein.<br />Wir senden dir einen Link zum Zurücksetzen des Passworts.') !!}
    </p>
    <!-- Session Status -->
    <x-forms.auth-session-status class=" mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.input-label for="email" :value="__('E-Mail Adresse')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center mt-10">
            <x-buttons.primary-button>
                {{ __('Passwort zurücksetzen') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>