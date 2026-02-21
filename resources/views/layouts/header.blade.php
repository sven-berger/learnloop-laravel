<header class="bg-red-800 rounded-2xl flex items-center justify-between p-6">
    <h2 class="text-3xl text-white">
        <a href="{{ route('index') }}">RiftCore.de</a>
    </h2>

    <nav class="flex items-center gap-4 text-white text-lg">
        <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="hover:underline">
            Anmelden
        </a>

        <a href="{{ Route::has('register') ? route('register') : url('/register') }}" class="hover:underline">
            Registrieren
        </a>
    </nav>
</header>