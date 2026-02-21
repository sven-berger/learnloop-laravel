@extends('layouts.base')
@section('title', 'Startseite (Laravel + Tailwind + Stimulus)')

@section('content')
<form method="POST" class="grid gap-4">
        @csrf
  <input name="email" placeholder="E-Mail" class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3" />
  <textarea name="message" placeholder="Nachricht" class="bg-white w-full p-4 border border-gray-200 rounded-2xl pt-6 pl-6 mt-3"></textarea>
  <button type="submit" class="bg-blue-500 text-white rounded-full p-4">Senden</button>
</form>

<h3 class="lg:text-2xl text-xl relative inline-block text-transparent bg-clip-text bg-linear-to-r from-sky-400 to-emerald-600 after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-full after:h-0.75 after:bg-linear-to-r after:from-sky-400 after:to-emerald-600 pb-2 mt-10 mb-5">
  Hallo Stimulus!
</h3>
<div data-controller="hello">
  <input
    data-hello-target="name"
    data-action="input->hello#sync"
    type="text"
    class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3"
    placeholder="Gib deinen Namen ein"
  />

  <button
    data-action="click->hello#greet"
    class="bg-blue-500 text-white rounded-full p-4 mt-5"
  >
    Begrüßung!
  </button>

  <div data-hello-target="output"></div>
</div>
@endsection