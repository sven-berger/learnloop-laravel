<section class="space-y-6">
    <header>
        <x-layout.h2 title="Account löschen" />

        <p class="mt-1 text-sm text-gray-600">Wenn du deinen Account löschst, werden alle Daten dauerhaft entfernt.</p>
    </header>

    <x-buttons.danger-button x-data="" type="button"
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-buttons.danger-button>

    <x-ui.modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-forms.input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-forms.text-input id="password" name="password" type="password" class="mt-1"
                    placeholder="{{ __('Password') }}" />

                <x-forms.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col sm:flex-row sm:justify-end gap-4">
                <x-buttons.secondary-button x-on:click="$dispatch('close')" class="sm:w-auto" type="button">
                    {{ __('Cancel') }}
                </x-buttons.secondary-button>

                <x-buttons.danger-button class="sm:w-auto">
                    {{ __('Delete Account') }}
                </x-buttons.danger-button>
            </div>
        </form>
    </x-ui.modal>
</section>