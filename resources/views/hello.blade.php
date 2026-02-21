@extends('layouts.base')
@section('title', 'Hello Stimulus!')

@section('content')
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