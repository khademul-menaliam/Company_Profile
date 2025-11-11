<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind / App Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-indigo-100 via-white to-gray-200 min-h-screen flex items-center justify-center">

    <!-- Optional subtle pattern -->
    <div class="absolute inset-0 bg-[url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png')] opacity-10"></div>

    <div class="relative z-10 w-full max-w-md mx-auto px-6 py-10">
        <div class="bg-white/30 backdrop-blur-md shadow-2xl shadow-indigo-800/80 border border-white/50 rounded-3xl px-8 py-8 transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-3xl hover:shadow-indigo-600/50">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <p class="mt-8 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name', 'MyApp') }}. All rights reserved.
        </p>
    </div>
</body>
</html>
