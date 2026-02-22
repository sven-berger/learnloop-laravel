<x-layout.box>
    <x-layout.h2 title="Navigation"></x-layout.h2>
    <div class="mb-5">
        <x-layout.ul :items="[
        ['label' => 'Startseite', 'href' => route('index')],
        ['label' => 'Gästebuch', 'href' => route('guestbook')],
    ]" />
    </div>

    <hr class="border-gray-400" />

    <div class="mt-5">
        <x-layout.ul :items="[
        ['label' => 'Impressum', 'href' => route('imprint')],
        ['label' => 'Datenschutzerklärung', 'href' => route('privacyPolicy')],
        ['label' => 'Nutzungsbedingungen', 'href' => route('termsOfUse')],
    ]" />

    </div>


</x-layout.box>