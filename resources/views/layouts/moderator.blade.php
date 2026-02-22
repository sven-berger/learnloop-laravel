@php
    $pageTitle = match (true) {
        request()->routeIs('moderation.*') => 'Moderationsbereich',
        default => 'Moderation',
    };
@endphp

@extends('layouts.base')

@section('title', $pageTitle)

@section('content')
    {{ $slot }}
@endsection