@php
    use App\Models\Service;
    use App\Models\SiteSetting;

    $mainServices = Service::whereNull('parent_id')
        ->where('status', true)
        ->orderBy('sort_order', 'asc')
        ->take(3)
        ->get(['title', 'slug']);

    $profile = SiteSetting::where('setting_key', 'company_profile')->value('setting_value');
@endphp

<header x-data="{ openMenu: false, scrolled: false }"
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="{'py-2 shadow-sm bg-white/95 backdrop-blur-lg border-b border-slate-200': scrolled, 'py-4 bg-white/80 backdrop-blur-md border-b border-slate-200/50': !scrolled}"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300 px-4">

    <div class="w-full max-w-[1400px] mx-auto flex items-center justify-between px-2 lg:px-6">

        <!-- LOGO -->
        <div class="flex items-center lg:w-1/4">
            <a href="{{ url('/') }}" class="flex items-center gap-2 sm:gap-3 shrink-0 group">
                <div class="relative flex items-center justify-center">
                    <div class="absolute -inset-1 bg-indigo-500 rounded-full blur opacity-0 group-hover:opacity-20 transition duration-500"></div>
                    <img src="{{ asset('images/logo.png') }}" alt="AR Logo" class="h-10 lg:h-12 w-auto object-contain relative z-10">
                </div>
                <div class="flex items-center pb-2 lg:pt-1.5">
                    <span class="whitespace-nowrap text-xl xl:text-3xl font-black text-indigo-700 tracking-tight group-hover:text-slate-700 transition-colors duration-300">
                        ENGINEERING
                    </span>
                </div>
            </a>
        </div>

        <!-- DESKTOP MENU -->
        <nav class="hidden lg:flex items-center justify-center space-x-1 xl:space-x-6 flex-grow">

            <a href="{{ route('home') }}"
               class="relative px-2 py-2 text-sm xl:text-base font-bold transition-colors duration-200 group
               {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }}">
               Home
               <span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300
                            {{ request()->routeIs('home') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
            </a>

            <!-- SERVICES -->
            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="relative px-2 py-2 text-sm xl:text-base font-bold flex items-center gap-1 transition-colors duration-200
                               {{ request()->is('services*') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }}">
                    Services
                    <svg class="w-4 h-4 transform transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300
                                 {{ request()->is('services*') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                </button>

                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute top-full left-1/2 -translate-x-1/2 pt-4 w-64 z-50">
                    <div class="bg-slate-900 shadow-2xl shadow-slate-900/40 rounded-xl border border-slate-800 overflow-hidden py-2 text-slate-300">
                        
                        <a href="{{ route('sIndex') }}" class="block px-5 py-2.5 text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                            All Services
                        </a>
                        
                        <div class="h-px bg-slate-800 my-1 mx-4"></div>

                        @foreach($mainServices as $service)
                            <a href="{{ route('services.show', $service->slug) }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                                {{ $service->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <a href="{{ route('pIndex') }}"
               class="relative px-2 py-2 text-sm xl:text-base font-bold transition-colors duration-200 group
               {{ request()->routeIs('pIndex') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }}">
               Projects
               <span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300
                            {{ request()->routeIs('pIndex') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
            </a>

            <a href="{{ route('client') }}"
               class="relative px-2 py-2 text-sm xl:text-base font-bold transition-colors duration-200 group
               {{ request()->routeIs('client') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }}">
               Clients
               <span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300
                            {{ request()->routeIs('client') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
            </a>

            <!-- CAREERS -->
            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="relative px-2 py-2 text-sm xl:text-base font-bold flex items-center gap-1 transition-colors duration-200
                               {{ request()->is('careers*') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }}">
                    Join Us
                    <svg class="w-4 h-4 transform transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300
                                 {{ request()->is('careers*') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                </button>

                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute top-full left-1/2 -translate-x-1/2 pt-4 w-56 z-50">
                    <div class="bg-slate-900 shadow-2xl shadow-slate-900/40 rounded-xl border border-slate-800 overflow-hidden py-2 text-slate-300">
                        <a href="{{ route('careers.why') }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                             Why Join Us
                        </a>
                        <a href="{{ route('careers.job') }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                             Job Vacancy
                        </a>
                        <a href="{{ route('careers.internship') }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                             Internship
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ route('gallary.video') }}"
               class="relative px-2 py-2 text-sm xl:text-base font-bold transition-colors duration-200 group
               {{ request()->routeIs('gallary.video') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }}">
               Gallery
               <span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300
                            {{ request()->routeIs('gallary.video') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
            </a>

            <!-- ABOUT -->
            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="relative px-2 py-2 text-sm xl:text-base font-bold flex items-center gap-1 transition-colors duration-200
                               {{ request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }}">
                    About Us
                    <svg class="w-4 h-4 transform transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300
                                 {{ request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                </button>

                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute top-full left-1/2 -translate-x-1/2 pt-4 w-56 z-50">
                    <div class="bg-slate-900 shadow-2xl shadow-slate-900/40 rounded-xl border border-slate-800 overflow-hidden py-2 text-slate-300">
                        <a href="{{ route('about') }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                             About Us
                        </a>
                        <a href="{{ route('contact.index') }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                             Contact
                        </a>
                        <a href="{{ route('howItWorks') }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-800 hover:text-white transition-colors border-l-2 border-transparent hover:border-indigo-500">
                             How We Work
                        </a>
                    </div>
                </div>
            </div>

        </nav>

        <!-- DOWNLOAD BUTTON DESKTOP -->
        <div class="hidden lg:flex items-center justify-end lg:w-1/4">
            <a href="{{ $profile }}" target="_blank" download
               class="group relative px-6 py-2.5 font-bold text-white rounded-lg overflow-hidden shadow-md bg-indigo-600 hover:shadow-lg hover:shadow-indigo-500/40 transition-all duration-300 border border-indigo-500/50">
                <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-indigo-600 to-indigo-500 opacity-90"></div>
                <div class="absolute bottom-0 right-0 block w-64 h-64 mb-32 mr-4 transition duration-500 origin-bottom-left transform rotate-45 translate-x-24 bg-white opacity-10 group-hover:rotate-90"></div>
                <span class="relative flex items-center gap-2 text-lg group-hover:font-extrabold group-hover:scale-[1.02] transition-transform duration-300 tracking-wide">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Profile
                </span>
            </a>
        </div>

        <!-- MOBILE BUTTON -->
        <div class="lg:hidden flex items-center z-50">
            <button @click="openMenu = !openMenu"
                    class="relative p-2 text-slate-800 hover:text-indigo-600 focus:outline-none transition-colors group">
                <div class="absolute inset-0 bg-slate-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <svg x-show="!openMenu" class="w-7 h-7 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg x-show="openMenu" class="w-7 h-7 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>

    <!-- MOBILE MENU OVERLAY & SIDEBAR -->
    <template x-teleport="body">
        <div class="lg:hidden relative z-[100]">
        <!-- Backdrop -->
        <div x-show="openMenu"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40"
             @click="openMenu = false">
        </div>

        <!-- Sidebar -->

        <!-- Sidebar Wrapper -->
{{-- <div x-show="openMenu"
     x-data="{ 
        activeMenu: '{{ 
            request()->is('services*') ? 'services' : 
            (request()->is('careers*') ? 'careers' : 
            (request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'about' : null)) 
        }}' 
     }"
     x-transition:enter="transition ease-in-out duration-300 transform"
     x-transition:enter-start="translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in-out duration-300 transform"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="translate-x-full"
     class="fixed top-0 right-0 w-[70%] max-w-[70%] sm:w-[90%] sm:max-w-[50%] md:w-[40%] md:max-w-[40%] h-full bg-white shadow-2xl z-50 overflow-y-auto flex flex-col border-l border-slate-200"> --}}


     <!-- Sidebar -->
<div x-show="openMenu"
     x-data="{ 
        activeMenu: '{{ 
            request()->is('services*') ? 'services' : 
            (request()->is('careers*') ? 'careers' : 
            (request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'about' : null)) 
        }}' 
     }"
     x-transition:enter="transition ease-in-out duration-300 transform"
     x-transition:enter-start="translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in-out duration-300 transform"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="translate-x-full"
     style="width: 50% !important; max-width: 50% !important;"
     class="fixed top-0 right-0 h-full bg-white shadow-2xl z-50 overflow-y-auto flex flex-col border-l border-slate-200">

        {{-- <div x-show="openMenu"
             x-data="{ 
                activeMenu: '{{ 
                    request()->is('services*') ? 'services' : 
                    (request()->is('careers*') ? 'careers' : 
                    (request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'about' : null)) 
                }}' 
             }"
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed top-0 right-0 w-full max-w-sm h-full bg-white shadow-2xl z-50 overflow-y-auto flex flex-col border-l border-slate-200">
             --}}
            <!-- Header -->
            {{-- <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100 bg-slate-50/50"> --}}
            {{-- <div class="fixed top-0 right-0 w-1/2 h-full bg-white shadow-2xl z-50 overflow-y-auto flex flex-col border-l border-slate-200">


                <span class="text-xl font-black text-slate-800 tracking-tight">MENU</span>
                <button @click="openMenu = false" class="p-2 text-slate-500 hover:text-indigo-600 hover:bg-slate-100 rounded-lg transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div> --}}

            <!-- Header -->
<div class="flex flex-row items-center justify-between px-3 sm:px-6 py-5 border-b border-slate-100 bg-slate-50/50">
    <span class="text-base sm:text-xl font-black text-slate-800 tracking-tight shrink-0">MENU</span>
    <button @click="openMenu = false" class="p-1.5 sm:p-2 text-slate-500 hover:text-indigo-600 hover:bg-slate-100 rounded-lg transition-colors shrink-0">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>

            <!-- Links -->
            <div class="flex-grow px-4 py-6 space-y-2">

                <a @click="openMenu = false" href="{{ route('home') }}"
                   class="block px-4 py-3 font-bold rounded-lg transition-colors border-l-4
                   {{ request()->routeIs('home') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-slate-300' }}">
                    Home
                </a>

                <!-- SERVICES -->
                <div class="rounded-lg overflow-hidden">
                    <button @click="activeMenu = (activeMenu === 'services' ? null : 'services')"
                            class="w-full text-left px-4 py-3 font-bold flex justify-between items-center transition-colors border-l-4
                            {{ request()->is('services*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-slate-300' }}">
                        Services
                        <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': activeMenu === 'services' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeMenu === 'services'" x-collapse class="pl-8 pr-4 py-2 space-y-1 bg-slate-50/50">
                        <a @click="openMenu = false" href="{{ route('sIndex') }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->routeIs('sIndex') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                            All Services
                        </a>
                        @foreach($mainServices as $service)
                            <a @click="openMenu = false" href="{{ route('services.show', $service->slug) }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->is('services/'.$service->slug) ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                                {{ $service->title }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a @click="openMenu = false" href="{{ route('pIndex') }}"
                   class="block px-4 py-3 font-bold rounded-lg transition-colors border-l-4
                   {{ request()->routeIs('pIndex') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-slate-300' }}">
                    Our Projects
                </a>

                <a @click="openMenu = false" href="{{ route('client') }}"
                   class="block px-4 py-3 font-bold rounded-lg transition-colors border-l-4
                   {{ request()->routeIs('client') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-slate-300' }}">
                    Clients
                </a>

                <!-- CAREERS -->
                <div class="rounded-lg overflow-hidden">
                    <button @click="activeMenu = (activeMenu === 'careers' ? null : 'careers')"
                            class="w-full text-left px-4 py-3 font-bold flex justify-between items-center transition-colors border-l-4
                            {{ request()->is('careers*') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-slate-300' }}">
                        Join Us
                        <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': activeMenu === 'careers' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeMenu === 'careers'" x-collapse class="pl-8 pr-4 py-2 space-y-1 bg-slate-50/50">
                        <a @click="openMenu = false" href="{{ route('careers.why') }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->routeIs('careers.why') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                            Why Join Us
                        </a>
                        <a @click="openMenu = false" href="{{ route('careers.job') }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->routeIs('careers.job') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                            Job Vacancy
                        </a>
                        <a @click="openMenu = false" href="{{ route('careers.internship') }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->routeIs('careers.internship') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                            Internship
                        </a>
                    </div>
                </div>

                <a @click="openMenu = false" href="{{ route('gallary.video') }}"
                   class="block px-4 py-3 font-bold rounded-lg transition-colors border-l-4
                   {{ request()->routeIs('gallary.video') ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-slate-300' }}">
                    Gallery
                </a>

                <!-- ABOUT -->
                <div class="rounded-lg overflow-hidden">
                    <button @click="activeMenu = (activeMenu === 'about' ? null : 'about')"
                            class="w-full text-left px-4 py-3 font-bold flex justify-between items-center transition-colors border-l-4
                            {{ (request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks')) ? 'bg-indigo-50 border-indigo-600 text-indigo-700' : 'border-transparent text-slate-700 hover:bg-slate-50 hover:text-indigo-600 hover:border-slate-300' }}">
                        About Us
                        <svg class="w-5 h-5 transform transition-transform duration-300" :class="{ 'rotate-180': activeMenu === 'about' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeMenu === 'about'" x-collapse class="pl-8 pr-4 py-2 space-y-1 bg-slate-50/50">
                        <a @click="openMenu = false" href="{{ route('about') }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->routeIs('about') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                            About Us
                        </a>
                        <a @click="openMenu = false" href="{{ route('contact.index') }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->routeIs('contact.index') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                            Contact
                        </a>
                        <a @click="openMenu = false" href="{{ route('howItWorks') }}" class="block py-2 text-sm font-semibold transition-colors {{ request()->routeIs('howItWorks') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }}">
                            How We Work
                        </a>
                    </div>
                </div>
            </div>

            <!-- DOWNLOAD -->
            <div class="p-6 border-t border-slate-100 bg-slate-50/50 mt-auto">
                <a @click="openMenu = false" href="{{ $profile }}" target="_blank" download
                   class="flex items-center justify-center gap-2 w-full py-4 text-center rounded-xl bg-indigo-600 text-white font-black text-lg hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/30 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Profile
                </a>
            </div>

        </div>
    </div>
    </template>
</header>