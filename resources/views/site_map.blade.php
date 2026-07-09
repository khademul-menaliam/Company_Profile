@extends('layouts.app')
@section('title', 'Sitemap | AR Engineering')


@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-8 text-center overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Sitemap of AR Engineering</h1>
    </div>
    <div class="absolute inset-0 bg-[url('/images/clients-bg.jpg')] bg-cover bg-center opacity-10"></div>
    </section>
    
    <section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        {{-- Main Pages --}}
        <div class="bg-white shadow-lg rounded-2xl p-8 hover:shadow-2xl transition duration-300">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Pages</h2>
            <ul class="space-y-4 text-gray-700">
            <li><a href="{{ route('home') }}" class="hover:text-indigo-600 transition">🏠 Home</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-indigo-600 transition">ℹ️ About Us</a></li>
            <li><a href="{{ route('sIndex') }}" class="hover:text-indigo-600 transition">🛠 Services</a></li>
            <li><a href="{{ route('pIndex') }}" class="hover:text-indigo-600 transition">📁 Projects</a></li>
            <li><a href="{{ route('gallary.video') }}" class="hover:text-indigo-600 transition">📸 Gallery</a></li>
            <li><a href="{{ route('contact.index') }}" class="hover:text-indigo-600 transition">📧 Contact Us</a></li>
            <li><a href="{{ route('howItWorks') }}" class="hover:text-indigo-600 transition">⚙️ How It Works</a></li>
            <li><a href="{{ route('site_map.index') }}" class="hover:text-indigo-600 transition font-semibold">🗺 Sitemap</a></li>
            </ul>

            {{-- Careers --}}
            <h2 class="text-2xl font-semibold mt-8 mb-6 text-gray-800">Careers</h2>
            <ul class="space-y-4 text-gray-700">
            <li><a href="{{ route('careers.why') }}" class="hover:text-indigo-600 transition">❓ Why Join Us</a></li>
            <li><a href="{{ route('careers.job') }}" class="hover:text-indigo-600 transition">💼 Job Openings</a></li>
            <li><a href="{{ route('careers.internship') }}" class="hover:text-indigo-600 transition">🎓 Internships</a></li>
            </ul>
        </div>

        {{-- Social / Quick Links --}}
        <div class="bg-white shadow-lg rounded-2xl p-8 hover:shadow-2xl transition duration-300">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Follow Us</h2>
            @php
            use App\Models\SiteSetting;
            $facebook = SiteSetting::where('setting_key', 'facebook')->value('setting_value');
            $linkedin = SiteSetting::where('setting_key', 'linkedin')->value('setting_value');
            $x = SiteSetting::where('setting_key', 'x')->value('setting_value');
            @endphp
            <div class="flex space-x-4 mb-8">
            <a href="{{ $facebook }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
            </a>
            <a href="{{ $linkedin }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
            </a>
            <a href="{{ $x }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
            </div>

            {{-- Quick Links --}}
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Quick Links</h2>
            <ul class="space-y-4 text-gray-700">
            <li><a href="{{ route('home') }}" class="hover:text-indigo-600 transition">Home</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-indigo-600 transition">About Us</a></li>
            <li><a href="{{ route('sIndex') }}" class="hover:text-indigo-600 transition">All Services</a></li>
            <li><a href="{{ route('pIndex') }}" class="hover:text-indigo-600 transition">All Projects</a></li>
            <li><a href="{{ route('contact.index') }}" class="hover:text-indigo-600 transition">Contact Us</a></li>
            </ul>
        </div>
        </div>
    </div>
    </section>
@endsection
