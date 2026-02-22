<section>
    <header>
        <x-layout.h2 title="Passwort ändern" />

        <p class="mt-1 text-sm text-gray-600">Nutze ein langes, zufälliges Passwort, um deinen Account zu schützen.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-forms.input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-forms.text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1" autocomplete="current-password" />
            <x-forms.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-forms.input-label for="update_password_password" :value="__('New Password')" />
            <x-forms.text-input id="update_password_password" name="password" type="password" class="mt-1"
                autocomplete="new-password" />
            <x-forms.input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-forms.input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-forms.text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1" autocomplete="new-password" />
            <x-forms.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <x-buttons.primary-button class="sm:w-auto">{{ __('Save') }}</x-buttons.primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>