<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Scripts -->
        <!--@@vite(['resources/css/app.css', 'resources/js/app.js'])-->
    </head>
    <body class="font-sans antialiased">
        <main class="min-h-screen flex flex-1 px-24">
            <a href="{{ route('login') }}" class="m-auto">
                <div class="transition-all bg-blue-600 hover:bg-blue-500 text-white font-bold m-auto p-48 hover:p-56 hover:text-4xl text-3xl rounded-lg">Logowanie</div>
            </a>
            <a href="{{ route('register') }}" class="m-auto">
                <div class="transition-all bg-blue-600 hover:bg-blue-500 text-white font-bold m-auto p-48 hover:p-56 hover:text-4xl text-3xl rounded-lg">Rejestracja</div>
            </a>
        </div>
    </body>
</html>
