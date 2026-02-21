@extends('layouts.base')
@section('title', 'Testseite')

@section('content')

@php
    $selectValue = (string) old('selectMulti', $selectMulti);
@endphp

<div>
    <div class="mb-6">
        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">Rechen-Test</p>
        <h2 class="mt-2 text-2xl font-bold text-gray-900">Dein Multi-Faktor</h2>
        <p class="mt-1 text-sm text-gray-600">Gib Name und Zahlen ein, wir rechnen sofort.</p>
    </div>

    <form method="POST" class="grid gap-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
            <input
                class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
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
                class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
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
                class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
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
            class="inline-flex items-center justify-center rounded-lg p-4 bg-linear-to-r from-red-600 via-rose-600 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition hover:-translate-y-0.5 hover:shadow-red-500/30"
        >
            Absenden
        </button>
    </form>
</div>

@if ($finalNumber !== null)
    <div class="rounded-2xl border border-emerald-100 bg-linear-to-br from-emerald-50 via-white to-slate-50 p-6 shadow-lg">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-emerald-600">Ergebnis</p>
                <h2 class="mt-2 text-lg font-semibold text-gray-900">Hallo {{ $name ?: '...' }}, wie geht es dir?</h2>
            </div>
            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-600 text-white shadow-md shadow-emerald-200">
                <span class="text-lg font-bold">=</span>
            </div>
        </div>

        <div class="mt-5 flex flex-wrap items-center gap-3 text-gray-700">
            <span class="rounded-full bg-white px-3 py-1 text-sm font-semibold text-red-600 shadow-sm">
                {{ $randomNumber }}
                <span class="ml-1 text-[11px] font-normal text-gray-400">Deine Zahl</span>
            </span>
            <span class="text-sm font-semibold text-gray-500">x</span>
            <span class="rounded-full bg-white px-3 py-1 text-sm font-semibold text-red-600 shadow-sm">
                {{ $selectMulti }}
                <span class="ml-1 text-[11px] font-normal text-gray-400">Multi-Faktor</span>
            </span>
            <span class="text-sm font-semibold text-gray-500">=</span>
            <span class="rounded-full bg-emerald-600 px-3 py-1 text-sm font-semibold text-white shadow-sm">
                {{ $finalNumber }}
            </span>
        </div>
    </div>
@endif


@endsection