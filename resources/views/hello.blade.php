@extends('layouts.base')
@section('title', 'Hello Stimulus!')

@section('content')
  <x-layout.content>
    <div data-controller="hello">
      <x-forms.input-label for="hello_name" value="Dein Name" />
      <x-forms.text-input id="hello_name" type="text" class="mt-1" placeholder="Gib deinen Namen ein"
        data-hello-target="name" data-action="input->hello#sync" />

      <div class="mt-5">
        <x-buttons.primary-button type="button" data-action="click->hello#greet">Begrüßung!</x-buttons.primary-button>
      </div>

      <div data-hello-target="output"></div>
    </div>
  </x-layout.content>

@endsection