<x-admin-layout>
    <x-layout.content>
        <h1 class="text-xl font-semibold text-gray-900">Benutzer bearbeiten</h1>

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="mt-6 grid gap-5 w-full max-w-2xl">
            @csrf
            @method('PATCH')

            <div>
                <x-forms.input-label for="name" value="Name" />
                <x-forms.text-input id="name" name="name" type="text" class="mt-1" :value="old('name', $user->name)"
                    required />
                <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-forms.input-label for="email" value="E-Mail" />
                <x-forms.text-input id="email" name="email" type="email" class="mt-1" :value="old('email', $user->email)" required />
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center gap-3">
                <x-buttons.primary-button type="submit">Speichern</x-buttons.primary-button>
                <a href="{{ route('admin.users.management.index') }}"
                    class="text-sm text-gray-600 hover:underline">Zurück</a>
            </div>
        </form>
    </x-layout.content>
</x-admin-layout>