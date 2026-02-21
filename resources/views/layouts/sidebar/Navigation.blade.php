<x-box>
    <x-h2>Navigation</x-h2>
    <nav>
        <ul class="space-y-2">
            <li>
                <a class="block rounded-2xl p-2 hover:bg-amber-300" href="{{ route('index') }}">Startseite</a>
                <a class="block rounded-2xl p-2 hover:bg-amber-300" href="{{ route('guestbook') }}">Gästebuch</a>
            </li>
        </ul>
    </nav>
</x-box>