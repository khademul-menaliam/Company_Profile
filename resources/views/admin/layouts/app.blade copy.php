<!doctype html>
<html lang="en" x-data="{ sidebarOpen: false }">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Admin') - {{ config('app.name') }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside
        class="bg-white border-r w-64 space-y-6 px-4 py-4 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out z-50"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <!-- Logo / Brand -->
        <div class="text-2xl font-bold text-indigo-600 mb-6">{{ config('app.name') }}</div>

        <!-- Navigation -->
        <nav class="space-y-2 text-gray-700">

            <a href="{{ route('admin.dashboard') }}"
               class="block py-2 px-3 rounded hover:bg-indigo-100 transition-colors duration-200
               {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-100 font-semibold text-indigo-700' : '' }}">
               Dashboard
            </a>

            <!-- Pages (no submenu, normal link) -->
            <a href="{{ route('admin.pages.index') }}"
               class="block py-2 px-3 rounded hover:bg-indigo-100 transition-colors duration-200
               {{ request()->routeIs('admin.pages.*') ? 'bg-indigo-100 font-semibold text-indigo-700' : '' }}">
               Pages
            </a>

            <!-- Services Menu -->
            <div x-data="{ open: {{ request()->routeIs('admin.services.*') ? 'true' : 'false' }} }" class="space-y-1">
                <button @click="open = !open" class="w-full flex justify-between items-center py-2 px-3 rounded hover:bg-indigo-100 transition-colors duration-200
                    {{ request()->routeIs('admin.services.*') ? 'bg-indigo-100 font-semibold text-indigo-700' : '' }}">
                    <span>Services</span>
                    <svg :class="open ? 'rotate-90' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="ml-4 space-y-1">
                    <a href="{{ route('admin.services.index') }}" class="block py-1 px-3 rounded hover:bg-indigo-200 transition-colors duration-200
                        {{ request()->routeIs('admin.services.index') ? 'bg-indigo-200 font-semibold' : '' }}">
                        Services
                    </a>
                    <a href="{{ route('admin.services.create') }}" class="block py-1 px-3 rounded hover:bg-indigo-200 transition-colors duration-200
                        {{ request()->routeIs('admin.services.create') ? 'bg-indigo-200 font-semibold' : '' }}">
                        Add Service
                    </a>
                </div>
            </div>

            <!-- Projects Menu -->
            <div x-data="{ open: {{ request()->routeIs('admin.projects.*') ? 'true' : 'false' }} }" class="space-y-1">
                <button @click="open = !open" class="w-full flex justify-between items-center py-2 px-3 rounded hover:bg-indigo-100 transition-colors duration-200
                    {{ request()->routeIs('admin.projects.*') ? 'bg-indigo-100 font-semibold text-indigo-700' : '' }}">
                    <span>Projects</span>
                    <svg :class="open ? 'rotate-90' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="ml-4 space-y-1">
                    <a href="{{ route('admin.projects.index') }}" class="block py-1 px-3 rounded hover:bg-indigo-200 transition-colors duration-200
                        {{ request()->routeIs('admin.projects.index') ? 'bg-indigo-200 font-semibold' : '' }}">
                        View Projects
                    </a>
                    <a href="{{ route('admin.projects.create') }}" class="block py-1 px-3 rounded hover:bg-indigo-200 transition-colors duration-200
                        {{ request()->routeIs('admin.projects.create') ? 'bg-indigo-200 font-semibold' : '' }}">
                        Add Project
                    </a>
                </div>
            </div>

            <!-- Messages (normal link) -->
            <a href="{{ route('admin.messages.index') }}"
               class="block py-2 px-3 rounded hover:bg-indigo-100 transition-colors duration-200
               {{ request()->routeIs('admin.messages.*') ? 'bg-indigo-100 font-semibold text-indigo-700' : '' }}">
               Messages
            </a>

        </nav>
    </aside>

    <!-- Overlay for mobile -->
    <div class="fixed inset-0 bg-black bg-opacity-25 z-40 md:hidden"
         x-show="sidebarOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         style="display: none;"></div>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Top bar -->
        <header class="flex items-center justify-between bg-white border-b px-4 py-3 shadow md:shadow-none">
            <div class="flex items-center">
                <!-- Mobile menu button -->
                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden mr-3 text-gray-700 hover:text-indigo-600 focus:outline-none focus:ring">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
            </div>

            <!-- Optional user menu -->
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-2">
                    <span class="text-gray-600">Admin</span>
                    <img src="{{ asset('images/logo.png') }}" alt="Avatar" class="w-8 h-8 rounded-full border">
                </div>
            </div>
        </header>

        <!-- Page content -->
        <main class="flex-1 overflow-auto p-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 animate-fade-in">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<!-- Fade-in animation -->
<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(-5px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

</body>
</html>
