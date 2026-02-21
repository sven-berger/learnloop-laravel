<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen flex flex-col p-4">
        @include('layouts.header')
        <main class="flex flex-1 gap-8 max-sm:flex-col">
            <aside class="order-2 md:order-1 lg:w-110">
                <div class="min-h-full flex-1">
                    @include('layouts.sidebar.Navigation')
                    @include('layouts.sidebar.Templates')
                    @include('layouts.sidebar.Exercises')
                    @include('layouts.sidebar.ThatsMe')
                    @include('layouts.sidebar.Counter')
                </div>
            </aside>

            <section class="order-1 md:order-2 flex-1">
                <div class="flex-7">
                    @yield('content')
                </div>
            </section>
        </main>
    </div>
</body>

</html>