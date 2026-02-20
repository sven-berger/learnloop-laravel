<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[radial-gradient(1200px_circle_at_15%_20%,rgba(255,0,229,.85)_0%,transparent_55%),radial-gradient(900px_circle_at_85%_30%,rgba(0,245,255,.75)_0%,transparent_60%),radial-gradient(800px_circle_at_50%_90%,rgba(168,255,0,.65)_0%,transparent_55%),linear-gradient(135deg,#0b1020_0%,#080a12_100%)]
 min-h-screen flex items-center justify-center">
    <div
        class="bg-orange-600 p-12 rounded-3xl shadow-2xl max-w-md w-full mx-4 text-center transform hover:scale-105 transition-all duration-300">
        <h1 class="text-4xl font-bold text-gray-200 mb-6">Tailwind + Laravel</h1>
        <p class="text-lg text-gray-200 mb-8">Laravel + Tailwind lokal & auf Server!</p>
        <p class="text-md text-gray-200 mb-6">Deploy via GitHub Webhook aktiv.</p>
    </div>
</body>

</html>