@extends('layouts.base')
@section('title', 'Gästebuch')

@section('content')
    <x-content>
        <form method="POST" class="grid gap-4">
            @csrf
            <input name="email" placeholder="E-Mail" class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3" />
            <x-editor name="content" :value="old('content') ?? ''" />
            <button type="submit" class="bg-blue-500 text-white rounded-full p-4">Senden</button>
        </form>
    </x-content>
@endsection