@extends('layouts.base')
@section('title', 'Gästebuch')

@section('content')
    <x-content>
        @include('guestbook.errors.guestbook-error')
        @include('guestbook.errors.guestbook-flash')
        @include('guestbook.guestbookentry-form')
    </x-content>

    <x-content>
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
    </x-content>
@endsection