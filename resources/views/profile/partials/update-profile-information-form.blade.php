<section>
    <header>
        <x-layout.h2 title="Profilinformationen" />

        <p class="mt-1 text-sm text-gray-600">Profilname und E-Mail-Adresse aktualisieren.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-forms.input-label for="name" :value="__('Name')" />
            <x-forms.text-input id="name" name="name" type="text" class="mt-1" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-forms.input-label for="email" :value="__('E-Mail Adresse')" />
            <x-forms.text-input id="email" name="email" type="email" class="mt-1" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Ihre E-Mail-Adresse ist nicht verifiziert.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500/40">
                            {{ __('Klicken Sie hier, um die Verifizierungs-E-Mail erneut zu senden.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Ein neuer Verifizierungslink wurde an Ihre E-Mail-Adresse gesendet.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <x-buttons.primary-button class="sm:w-auto">{{ __('Speichern') }}</x-buttons.primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Gespeichert.') }}</p>
            @endif
        </div>
    </form>
</section>