<x-layout.box>
    <x-layout.h2 title="Navigation"></x-layout.h2>
    <x-layout.ul :items="[
        ['label' => 'Testseite', 'href' => route(name: 'test')],
        ['label' => 'Hallo Stimulus', 'href' => route('hello')],
    ]" />
</x-layout.box>