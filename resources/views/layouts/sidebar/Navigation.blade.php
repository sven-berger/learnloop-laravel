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
        ['label' => 'Impressum', 'href' => Route::has('impressum') ? route('impressum') : url('/impressum'), 'class' => 'hover:underline'],
        ['label' => 'Datenschutz', 'href' => Route::has('datenschutz') ? route('datenschutz') : url('/datenschutz'), 'class' => 'hover:underline'],
        ['label' => 'Kontakt', 'href' => Route::has('kontakt') ? route('kontakt') : url('/kontakt'), 'class' => 'hover:underline'],
    ]" />

    </div>


</x-layout.box>