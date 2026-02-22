<x-public-layout>

    @php
        $selectValue = (string) old('selectMulti', $selectMulti);
    @endphp

    <x-layout.content>
        <form method="POST" action="{{ route('test') }}" data-controller="form-own-input"
            class="grid gap-5 w-full min-w-0">
            @csrf
            <div>
                <x-forms.input-label for="name" value="Name" />
                <x-forms.text-input id="name" name="name" type="text" class="mt-1" :value="old('name', $name)"
                    placeholder="Bitte gib deinen Namen ein" required />
            </div>

            <div>
                <x-forms.input-label for="randomNumber" value="Zufällige Zahl (1-10)" />
                <x-forms.text-input id="randomNumber" name="randomNumber" type="number" class="mt-1"
                    :value="old('randomNumber', $randomNumber)" min="1" max="10" placeholder="z.B. 5" required />
            </div>

            <div>
                <x-forms.input-label for="selectMulti" value="Multi-Faktor" />
                <select id="selectMulti" name="selectMulti" data-form-own-input-target="select"
                    data-action="change->form-own-input#sync" required
                    class="mt-1 bg-white w-full min-w-0 p-4 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400">
                    <option value="">Bitte wählen…</option>
                    <option value="2" {{ $selectValue === '2' ? 'selected' : '' }}>2</option>
                    <option value="4" {{ $selectValue === '4' ? 'selected' : '' }}>4</option>
                    <option value="6" {{ $selectValue === '6' ? 'selected' : '' }}>6</option>
                    <option value="8" {{ $selectValue === '8' ? 'selected' : '' }}>8</option>
                    <option value="10" {{ $selectValue === '10' ? 'selected' : '' }}>10</option>
                    <option value="ownLetter" {{ $selectValue === 'ownLetter' ? 'selected' : '' }}>Eigene Zahl</option>
                </select>
                <p class="mt-2 text-xs text-gray-500">Wenn du „Eigene Zahl“ wählst, erscheint das Feld darunter.</p>
                <div data-form-own-input-target="slot"></div>
            </div>

            <x-buttons.primary-button type="submit">Absenden</x-buttons.primary-button>
        </form>
    </x-layout.content>

    @if ($finalNumber !== null)
        <x-layout.content>
            <x-layout.h2 title="Ergebnis" />

            <p class="text-gray-500 mb-5">Hallo {{ $name ?: '...' }}, wie geht es dir?</p>

            <div class="grid gap-2 text-gray-600">
                <p>Deine Zahl: <span class="font-medium">{{ $randomNumber }}</span></p>
                <p>Multi-Faktor: <span class="font-medium">{{ $selectMulti }}</span></p>
                <p>Ergebnis: <span class="font-medium">{{ $finalNumber }}</span></p>
            </div>
        </x-layout.content>
    @endif


</x-public-layout>