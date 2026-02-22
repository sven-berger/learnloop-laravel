@extends('layouts.base')
@section('title', 'Gästebuch')

@section('content')
    <x-layout.content>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-4 relative mb-4 rounded-2xl" role="alert">
                <strong class="font-bold">Fehler!</strong>
                <span class="block sm:inline">Es gab Fehler bei der Eingabe. Bitte überprüfe deine Angaben.</span>

                <x-forms.input-error :messages="$errors->all()" class="mt-2 text-red-600" />
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 relative mb-4 rounded-2xl" role="alert">
                <x-forms.auth-session-status class="text-green-700 font-bold" :status="session('success')" />
            </div>
        @endif

        @include('guestbook.guestbookentry-form')
    </x-layout.content>

    <x-layout.content>
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Gästebucheinträge</h2>
        @include('guestbook.pagination')
        @if ($entries->count() > 0)
            <div class="space-y-4">
                @foreach ($entries as $entry)
                    @include('guestbook.guestbookentry-card')
                @endforeach
            </div>
        @else
            <div class="text-center py-12 text-gray-500">
                <p class="text-lg">Noch keine Einträge vorhanden. Sei der erste, der einen Eintrag hinterlässt!</p>
            </div>
        @endif
    </x-layout.content>
@endsection