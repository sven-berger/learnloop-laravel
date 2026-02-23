<header
    class="bg-red-800 rounded-2xl flex flex-col gap-3 sm:gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6">
    <h2 class="text-2xl sm:text-3xl text-white wrap-break-word">
        <a href="{{ route('index') }}">RiftCore.de (Laravel + Tailwind + Stimulus)</a>
    </h2>

    <nav class="flex flex-wrap items-center gap-x-3 gap-y-2 text-white text-sm sm:text-base lg:text-lg">
        @auth
            <a href="{{ route('profile.edit') }}" class="hover:underline break-all">Angemeldet als:
                {{ Auth::user()->name }}</a>

            <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        @else
            <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="hover:underline">
                Anmelden
            </a>

            <a href="{{ Route::has('register') ? route('register') : url('/register') }}" class="hover:underline">
                Registrieren
            </a>
        @endauth
    </nav>
</header>