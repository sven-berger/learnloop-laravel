@extends('layouts.base')
@php($pageTitle = 'Startseite (Laravel + Tailwind + Stimulus)')
@section('title', $pageTitle)

@section('content')

  <x-content :title="$pageTitle">
    <form method="POST" class="grid gap-4">
      @csrf
      <input name="email" placeholder="E-Mail" class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3" />
      <textarea name="message" placeholder="Nachricht"
        class="bg-white w-full p-4 border border-gray-200 rounded-2xl pt-6 pl-6 mt-3"></textarea>
      <button type="submit" class="bg-blue-500 text-white rounded-full p-4">Senden</button>
    </form>
  </x-content>

  <x-content>
    <x-h2 title="Hallo Stimulus!"></x-h2>
    <div data-controller="hello">
      <input data-hello-target="name" data-action="input->hello#sync" type="text"
        class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3" placeholder="Gib deinen Namen ein" />

      <button data-action="click->hello#greet" class="bg-blue-500 text-white rounded-full p-4 mt-5">
        Begrüßung!
      </button>

      <div data-hello-target="output"></div>
    </div>
  </x-content>

  <x-grid-layout cols="4">
    <div>
      <x-card title="Card 1" image="/images/cardImage-1.jpg"
        description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores alias mollitia nemo soluta, libero tempore veritatis numquam aliquam officiis? Doloribus." />
    </div>
    <div>
      <x-card title="Card 2" image="/images/cardImage-2.jpg"
        description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores alias mollitia nemo soluta, libero tempore veritatis numquam aliquam officiis? Doloribus." />
    </div>
    <div>
      <x-card title="Card 3" image="/images/cardImage-3.jpg"
        description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores alias mollitia nemo soluta, libero tempore veritatis numquam aliquam officiis? Doloribus." />
    </div>
    <div>
      <x-card title="Card 4" image="/images/cardImage-4.jpg"
        description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores alias mollitia nemo soluta, libero tempore veritatis numquam aliquam officiis? Doloribus." />
    </div>
  </x-grid-layout>
@endsection