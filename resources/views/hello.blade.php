@extends('layouts.base')
@section('title', 'Hello Stimulus!')

@section('content')
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