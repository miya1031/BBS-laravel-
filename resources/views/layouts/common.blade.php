<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite('resources/css/app.css')
    </head>
    <body>
        <header class='flex justify-center navbar-primary bg-primary'>
                <h1 class="p-4 text-3xl font-bold text-white">ひとこと掲示板</h1>
        </header>
        <main>
            <div>
                {{ $slot }}
            </div>
        </main>
    </body>
</html>
