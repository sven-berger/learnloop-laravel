@php
    $pageTitle = match (true) {
        request()->routeIs('login') => 'Anmelden',
        request()->routeIs('register') => 'Registrieren',
        request()->routeIs('password.request') => 'Passwort vergessen',
        request()->routeIs('password.reset') => 'Passwort zurücksetzen',
        request()->routeIs('password.confirm') => 'Passwort bestätigen',
        request()->routeIs('verification.notice') => 'E-Mail verifizieren',
        default => 'Account',
    };
@endphp

@extends('layouts.base')

@section('title', $pageTitle)

@section('content')
    <x-layout.content>
        <div class="w-full max-w-md mx-auto">
            {{ $slot }}
        </div>
    </x-layout.content>
@endsection