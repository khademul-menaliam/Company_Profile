<!doctype html>
<html lang="en" x-data="{ sidebarOpen: false }">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Admin') - {{ config('app.name') }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <!-- Font Awesome (CDN) -->
    <!-- Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>

  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex h-screen overflow-hidden">

  <!-- Sidebar -->
    @include('admin.layouts.partials.sidebar')

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
        <main class="flex-1 overflow-auto p-4">
            {{-- @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 animate-fade-in">
                    {{ session('success') }}
                </div>
            @endif --}}

            @yield('content')
        </main>
    </div>
</div>

{{-- Auto-Generate Slug (JavaScript) --}}
<script>
document.querySelector('input[name="title"]').addEventListener('keyup', function () {
    let val = this.value.toLowerCase().trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');

    document.querySelector('input[name="slug"]').value = val;
});
</script>

</body>
</html>
