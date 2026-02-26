<x-public-layout>
  <p>Hö?</p>
  <div data-controller="hello">
    <x-layout.content>
      <x-forms.input-label for="formInput" value="Dein Name" />
      <x-forms.text-input
              id="formInput"
              type="text"
              class="mt-1"
              placeholder="Gib deinen Namen ein"
              data-hello-target="name"
              data-action="input->hello#update"
      />
    </x-layout.content>

    <x-layout.content
            data-hello-target="outputWrapper"
            class="hidden">

      <div data-hello-target="output"></div>
    </x-layout.content>
  </div>
</x-public-layout>