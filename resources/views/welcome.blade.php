<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-linear-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">
    <div
        class="bg-red-300 p-12 rounded-3xl shadow-2xl max-w-md w-full mx-4 text-center transform hover:scale-105 transition-all duration-300">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Tailwind Test</h1>
        <p class="text-lg text-gray-600 mb-8">Laravel + Tailwind lokal & auf Server!</p>
        <p class="text-sm text-gray-500 mb-6">Deploy via GitHub Webhook aktiv.</p>
        <div class="bg-green-100 p-6 rounded-2xl border-4 border-green-400">
            <p class="text-green-800 font-semibold">✅ Erfolg: Tailwind-Klassen wirken!</p>
        </div>
    </div>
</body>

</html>