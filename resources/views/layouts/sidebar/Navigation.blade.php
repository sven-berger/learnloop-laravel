<x-box>
    <x-h2 title="Navigation"></x-h2>
    <x-ul :items="[
        ['label' => 'Startseite', 'href' => route('index')],
        ['label' => 'Gästebuch', 'href' => route('guestbook')],
    ]" />
</x-box>