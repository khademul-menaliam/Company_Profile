<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>

    {{-- SEO Meta --}}
    <meta name="description" content="@yield('meta_description', 'Industrial Engineering Solution Provider')">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    {{-- Tailwind + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    {{-- Navbar --}}
    @include('includes.navbar')

    {{-- Page content --}}
    <main class="flex-grow pt-24">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('includes.footer')

</body>
</html>
