<form method="POST" action="{{ route('guestbook.save', [], false) }}"
    class="grid gap-4 w-full max-w-full min-w-0 overflow-x-hidden">
    @csrf
    <div class="min-w-0 w-full">
        <x-forms.input-label for="username" value="Benutzername" />
        <x-forms.text-input id="username" name="username" type="text" class="mt-1" placeholder="Benutzername"
            :value="old('username')" required />
        <x-forms.input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <div class="min-w-0 w-full">
        <x-forms.input-label for="email" value="E-Mail" />
        <x-forms.text-input id="email" name="email" type="email" class="mt-1" placeholder="E-Mail" :value="old('email')"
            required />
        <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="min-w-0 w-full">
        <x-forms.input-label for="title" value="Titel" />
        <x-forms.text-input id="title" name="title" type="text" class="mt-1" placeholder="Titel" :value="old('title')"
            required />
        <x-forms.input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <x-forms.editor name="message" id="content" :value="old('message') ?? ''" />

    <div class="min-w-0 w-full">
        <x-forms.input-label for="source" value="Wie bist du auf mich aufmerksam geworden?" />
        <select id="source" name="source"
            class="mt-1 bg-white w-full min-w-0 p-4 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400">
            <option value="">Bitte auswählen…</option>
            <option value="google">Google</option>
            <option value="woltlab">Durch WoltLab</option>
            <option value="bewerbung">Durch meine Bewerbungsschreiben</option>
        </select>
        <x-forms.input-error :messages="$errors->get('source')" class="mt-2" />
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
        <x-buttons.primary-button type="submit" class="sm:w-auto">Eintrag verfassen</x-buttons.primary-button>
        <x-buttons.secondary-button type="reset" class="sm:w-auto">Zurücksetzen</x-buttons.secondary-button>
    </div>
</form>