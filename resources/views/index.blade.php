@extends('layouts.base')
@section('title', 'Startseite (Laravel + Tailwind + Stimulus)')

@section('content')
<form method="POST" class="grid gap-4">
        @csrf
    <input name="email" placeholder="E-Mail" class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
 />
    <textarea name="message" placeholder="Nachricht" class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"></textarea>
    <button type="submit" class="inline-flex items-center justify-center rounded-lg p-4 bg-linear-to-r from-red-600 via-rose-600 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition hover:-translate-y-0.5 hover:shadow-red-500/30 ">Senden</button>
</form>


<h2 class="mt-10 mb-5 text-yellow-800 text-2xl font-bold">Hallo Stimulus!</h2>
<div data-controller="hello">
  <input
    data-hello-target="name"
    data-action="input->hello#sync"
    type="text"
    class="p-4 mt-2 w-full rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-900 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
    placeholder="Gib deinen Namen ein"
  />

  <button
    data-action="click->hello#greet"
    class="mt-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-2xl"
  >
    Begrüßung!
  </button>

  <div data-hello-target="output"></div>
</div>
@endsection