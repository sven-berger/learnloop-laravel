<x-box>
    <x-h2 title="Navigation"></x-h2>
    <x-ul :items="[
        ['label' => 'Testseite', 'href' => route(name: 'test')],
        ['label' => 'Hallo Stimulus', 'href' => route('hello')],
    ]" />
</x-box>