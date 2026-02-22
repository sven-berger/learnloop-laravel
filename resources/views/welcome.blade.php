@extends('layouts.base')

@section('title', 'Welcome')

@section('content')
    <x-layout.content title="Dashboard">
        <p class="text-gray-700">
            Willkommen! Diese Seite wird von Laravel Breeze während der Installation angepasst.
        </p>

        @if (Route::has('login'))
            <div class="mt-6 flex flex-col sm:flex-row gap-3">
                @auth
                    <a href="/dashboard" class="bg-blue-500 text-white rounded-2xl px-6 py-3 text-center w-full sm:w-auto">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white border border-gray-200 rounded-2xl px-6 py-3 text-center w-full sm:w-auto hover:bg-gray-50">
                        Anmelden
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-white border border-gray-200 rounded-2xl px-6 py-3 text-center w-full sm:w-auto hover:bg-gray-50">
                            Registrieren
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </x-layout.content>
@endsection