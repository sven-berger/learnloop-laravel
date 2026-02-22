@php
    $pageTitle = match (true) {
        request()->routeIs('admin.index') => 'Adminbereich',
        request()->routeIs('admin.users.management.*') => 'Benutzerverwaltung',
        request()->routeIs('admin.users.roles.*') => 'Benutzerrollen verwalten',
        request()->routeIs('admin.content.create') => 'Inhalte erstellen',
        request()->routeIs('admin.contentPage.*') => 'Admin Inhalte',
        default => 'Admin',
    };
@endphp

@extends('layouts.base')

@section('title', $pageTitle)

@section('content')
    {{ $slot }}
@endsection