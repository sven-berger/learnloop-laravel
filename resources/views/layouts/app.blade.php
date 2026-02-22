@php
    $pageTitle = match (true) {
        request()->routeIs('dashboard') => 'Dashboard',
        request()->routeIs('profile.*') => 'Profil',
        default => 'App',
    };
@endphp

@extends('layouts.base')

@section('title', $pageTitle)

@section('content')
    {{ $slot }}
@endsection