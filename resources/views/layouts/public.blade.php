@php
    $pageTitle = match (true) {
        request()->routeIs('index') => 'RiftCore',
        request()->routeIs('welcome') => 'Welcome',
        request()->routeIs('hello') => 'Hello Stimulus!',
        request()->routeIs('guestbook') => 'Gästebuch',
        request()->routeIs('guessnumbers') => 'Guess Numbers',
        request()->routeIs('test') => 'Testseite',
        request()->routeIs('imprint') => 'Impressum',
        request()->routeIs('privacyPolicy') => 'Datenschutzerklärung',
        request()->routeIs('termsOfUse') => 'Nutzungsbedingungen',
        default => 'LearnLoop',
    };
@endphp

@extends('layouts.base')

@section('title', $pageTitle)

@section('content')
    {{ $slot }}
@endsection