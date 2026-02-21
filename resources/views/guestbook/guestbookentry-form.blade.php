<form method="POST" action="{{ route('guestbook.save', [], false) }}" class="grid gap-4">
    @csrf
    <input name="username" id="username" placeholder="Benutzername" value="{{ old('username') }}" @class([
        'bg-white w-full p-4 border rounded-2xl',
        'border-gray-200' => !$errors->has('username'),
        'border-red-400' => $errors->has('username'),
    ]) />

    <input name="email" id="email" placeholder="E-Mail" value="{{ old('email') }}" @class([
        'bg-white w-full p-4 border rounded-2xl mt-3',
        'border-gray-200' => !$errors->has('email'),
        'border-red-400' => $errors->has('email'),
    ]) />

    <input name="title" id="title" placeholder="Titel" value="{{ old('title') }}" @class([
        'bg-white w-full p-4 border rounded-2xl mt-3',
        'border-gray-200' => !$errors->has('title'),
        'border-red-400' => $errors->has('title'),
    ]) />

    <x-editor name="message" id="content" :value="old('message') ?? ''" />

    <select id="source" name="source" @class([
        'bg-white w-full p-4 border rounded-2xl mt-3',
        'border-gray-200' => !$errors->has('source'),
        'border-red-400' => $errors->has('source'),
    ])>
        <option value="">Wie bist du auf mich aufmerksam geworden?</option>
        <option value="google">Google</option>
        <option value="woltlab">Durch WoltLab</option>
        <option value="bewerbung">Durch meine Bewerbungsschreiben</option>
    </select>

    <div class="flex gap-4">
        <div>
            <button type="submit" class="bg-blue-500 text-white rounded-full p-4">Eintrag verfassen</button>
        </div>
        <div>
            <button type="reset" class="bg-yellow-600 text-white rounded-full p-4">Zurücksetzen</button>
        </div>
    </div>
</form>