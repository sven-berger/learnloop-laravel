@extends('layouts.base')
@section('title', 'Startseite')

@section('content')
<form method="POST" class="grid gap-4">
        <!-- @csrf -->
    <input name="email" placeholder="E-Mail" class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
 />
    <textarea name="message" placeholder="Nachricht" class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"></textarea>
    <button type="submit" class="inline-flex items-center justify-center rounded-lg p-4 bg-linear-to-r from-red-600 via-rose-600 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition hover:-translate-y-0.5 hover:shadow-red-500/30 ">Senden</button>
</form>
@endsection