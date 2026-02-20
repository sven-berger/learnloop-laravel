<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-yellow-900 min-h-screen flex items-center justify-center">
    <div
        class="bg-orange-600 p-12 rounded-3xl shadow-2xl max-w-md w-full mx-4 text-center transform hover:scale-105 transition-all duration-300">
        <h1 class="text-4xl font-bold text-gray-200 mb-6">Tailwind Test</h1>
        <p class="text-lg text-gray-200 mb-8">Laravel + Tailwind lokal & auf Server!</p>
        <p class="text-md text-gray-200 mb-6">Deploy via GitHub Webhook aktiv.</p>
        <div class="bg-green-100 p-6 rounded-2xl border-4 border-green-400">
            <p class="text-green-800 font-semibold">✅ Erfolg: Tailwind-Klassen wirken!</p>
        </div>
    </div>

    <div class="bg-yellow-100 mb-20 p-5 border-2 border-yellow-400 rounded-lg mt-10 max-w-md w-full mx-4 text-center">
        <p class="text-black font-semibold">⚠️ Hinweis: Bitte Cache leeren, wenn Änderungen nicht sichtbar sind.</p>   
    </div>
</body>

</html>