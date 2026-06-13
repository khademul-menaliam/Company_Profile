@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-cyan-600 text-white rounded-xl p-4 shadow">
        <div class="text-3xl font-bold">3</div>
        <div>Total Services</div>
        <a href="#" class="text-sm mt-2 inline-block text-white/80 hover:text-white">More info →</a>
    </div>

    <div class="bg-green-600 text-white rounded-xl p-4 shadow">
        <div class="text-3xl font-bold">13</div>
        <div>Total Projects</div>
        <a href="#" class="text-sm mt-2 inline-block text-white/80 hover:text-white">More info →</a>
    </div>

    <div class="bg-sky-600 text-white rounded-xl p-4 shadow">
        <div class="text-3xl font-bold">7</div>
        <div>Pending Projects</div>
        <a href="#" class="text-sm mt-2 inline-block text-white/80 hover:text-white">More info →</a>
    </div>

    <div class="bg-gray-200 text-gray-800 rounded-xl p-4 shadow">
        <div class="text-3xl font-bold">6</div>
        <div>Complete Projects</div>
        <a href="#" class="text-sm mt-2 inline-block text-gray-600 hover:text-gray-800">More info →</a>
    </div>
</div>

<!-- Collapsible Panels -->
<div class="space-y-4">
    <div x-data="{ open: false }" class="bg-white shadow rounded-lg">
        <button @click="open = !open" class="w-full text-left px-4 py-2 font-semibold flex justify-between items-center">
            Latest Projects
            <span x-text="open ? '−' : '+'"></span>
        </button>
        <div x-show="open" x-transition class="px-4 py-3 border-t text-gray-700">
            <p>Post 1, Post 2, Post 3...</p>
        </div>
    </div>

    <div x-data="{ open: false }" class="bg-white shadow rounded-lg">
        <button @click="open = !open" class="w-full text-left px-4 py-2 font-semibold flex justify-between items-center">
            Services
            <span x-text="open ? '−' : '+'"></span>
        </button>
        <div x-show="open" x-transition class="px-4 py-3 border-t text-gray-700">
            <p>Category 1, Category 2, Category 3...</p>
        </div>
    </div>

    <div x-data="{ open: false }" class="bg-white shadow rounded-lg">
        <button @click="open = !open" class="w-full text-left px-4 py-2 font-semibold flex justify-between items-center">
            Latest Created Users & Admins
            <span x-text="open ? '−' : '+'"></span>
        </button>
        <div x-show="open" x-transition class="px-4 py-3 border-t text-gray-700">
            <p>User 1, Admin 2, etc.</p>
        </div>
    </div>
</div>
@endsection
