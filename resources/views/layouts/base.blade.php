<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>





<body class="bg-[radial-gradient(1200px_circle_at_15%_20%,rgba(255,0,229,.85)_0%,transparent_55%),radial-gradient(900px_circle_at_85%_30%,rgba(0,245,255,.75)_0%,transparent_60%),radial-gradient(800px_circle_at_50%_90%,rgba(168,255,0,.65)_0%,transparent_55%),linear-gradient(135deg,#0b1020_0%,#080a12_100%)]">
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="bg-gray-800 text-white p-4">
            <h1 class="text-xl font-semibold">LearnLoop Formular</h1>
        </header>

        <!-- Main Layout -->
        <div class="flex flex-1">

            <aside class="w-1/5 pt-5 px-4">
                @include('layouts.sidebar.Navigation')
                @include('layouts.sidebar.Exercises')
            </aside>

            <main class="flex-1 p-8 bg-white m-5">
                <h2 class="text-2xl text-green-700 font-bold mb-6">@yield('title')</h2>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>