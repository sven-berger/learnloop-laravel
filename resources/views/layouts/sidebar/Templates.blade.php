<x-layout.box>
    <x-layout.h2 title="Vorlagen (Templates)"></x-layout.h2>
    <x-layout.ul :items="[
        ['label' => 'API Integration', 'href' => '/'],
        ['label' => 'Datenbank (Auslesen und Schreiben)', 'href' => '/'],
        ['label' => 'Komponenten (PHP Blade)', 'href' => '/'],
    ]" />
    <x-layout.ul class="mt-10" :items="[
        ['label' => 'Hallo Stimulus', 'href' => route('hello')],
        ['label' => 'Formular (+ JavaScript für Interaktivität)', 'href' => route(name: 'test')],

    ]" />

</x-layout.box>