@extends('layouts.base')
@section('title', 'Testseite')

@section('content')

@php
    $selectValue = (string) old('selectMulti', $selectMulti);
@endphp

<div>
    <form method="POST" class="grid gap-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
            <input
                class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3"
                id="name"
                name="name"
                value="{{ old('name', $name) }}"
                placeholder="Bitte gib deinen Namen ein"
                required
            />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700" for="randomNumber">Zufallige Zahl (1-10)</label>
            <input
                type="number"
                id="randomNumber"
                name="randomNumber"
                class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3"
                min="1"
                max="10"
                value="{{ old('randomNumber', $randomNumber) }}"
                placeholder="z.B. 5"
                required
            />
        </div>

        <div data-controller="form-own-input">
            <label class="block text-sm font-medium text-gray-700" for="selectMulti">Multi-Faktor</label>
            <select
                class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3"
                id="selectMulti"
                name="selectMulti"
                data-form-own-input-target="select"
                data-action="change->form-own-input#sync"
                required
            >
                <option value="">Bitte wahlen:</option>
                <option value="2" {{ $selectValue === '2' ? 'selected' : '' }}>2</option>
                <option value="4" {{ $selectValue === '4' ? 'selected' : '' }}>4</option>
                <option value="6" {{ $selectValue === '6' ? 'selected' : '' }}>6</option>
                <option value="8" {{ $selectValue === '8' ? 'selected' : '' }}>8</option>
                <option value="10" {{ $selectValue === '10' ? 'selected' : '' }}>10</option>
                <option value="ownLetter" {{ $selectValue === 'ownLetter' ? 'selected' : '' }}>Eigene Zahl</option>
            </select>
            <p class="mt-2 text-xs text-gray-500">Wenn du "Eigene Zahl" wahlst, erscheint das Feld darunter.</p>
            <div data-form-own-input-target="slot"></div>
        </div>

        <button
            type="submit"
            class="bg-blue-500 text-white rounded-full p-4"
        >
            Absenden
        </button>
    </form>
</div>

@if ($finalNumber !== null)
    <div class="bg-white w-full p-6 border border-gray-200 rounded-2xl mt-10">
        <h3 class="lg:text-2xl text-xl relative inline-block text-transparent bg-clip-text bg-linear-to-r from-sky-400 to-emerald-600 after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-full after:h-0.75 after:bg-linear-to-r after:from-sky-400 after:to-emerald-600 pb-2 mb-5">
            Ergebnis
        </h3>

        <p class="text-gray-500 mb-5">Hallo {{ $name ?: '...' }}, wie geht es dir?</p>

        <div class="grid gap-2 text-gray-600">
            <p>Deine Zahl: <span class="font-medium">{{ $randomNumber }}</span></p>
            <p>Multi-Faktor: <span class="font-medium">{{ $selectMulti }}</span></p>
            <p>Ergebnis: <span class="font-medium">{{ $finalNumber }}</span></p>
        </div>
    </div>
@endif


@endsection