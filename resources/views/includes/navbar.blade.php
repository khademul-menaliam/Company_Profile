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

<header x-data="{ openMenu: false }"
        class="bg-white/90 backdrop-blur-md shadow-md fixed top-0 left-0 w-full z-50 border-b border-gray-200 px-4">

    <div class="w-full flex items-center justify-between py-4 px-4 lg:px-8">

        <!-- LOGO -->
        <div class="flex items-center lg:w-1/4">
            <a href="{{ url('/') }}" class="flex items-center shrink-0">
                <img src="{{ asset('images/logo.png') }}"
                     alt="AR Logo"
                     class="h-12 w-auto object-contain block">

                <span class="whitespace-nowrap text-xl xl:text-2xl font-extrabold text-indigo-700 tracking-tighter -ml-1 mb-2">
                    ENGINEERING
                </span>
            </a>
        </div>

        <!-- DESKTOP MENU -->
        <nav class="hidden lg:flex items-center justify-center space-x-2 xl:space-x-6 flex-grow">

            <a href="{{ route('home') }}"
               class="px-3 py-2 rounded-lg font-semibold transition-all duration-200
               {{ request()->routeIs('home') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
               Home
            </a>

            <!-- SERVICES -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" @click.away="open = false"
                    class="px-3 py-2 rounded-lg font-semibold flex items-center transition-all duration-200
                    {{ request()->is('services*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                    Services
                    <svg class="w-4 h-4 ml-1 transform transition-transform duration-200"
                         :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open"
                     x-transition
                     class="absolute bg-white shadow-xl rounded-xl mt-2 w-72 z-50 border border-gray-100 overflow-hidden left-1/2 -translate-x-1/2">

                    <a href="{{ route('sIndex') }}"
                       class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white transition-colors">
                        All Services
                    </a>

                    @foreach($mainServices as $service)
                        <a href="{{ route('services.show', $service->slug) }}"
                           class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white transition-colors">
                            {{ $service->title }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('pIndex') }}"
               class="px-2 xl:px-3 py-2 rounded-lg font-semibold transition-all duration-200
               {{ request()->routeIs('pIndex') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
               Projects
            </a>

            <a href="{{ route('client') }}"
               class="px-2 xl:px-3 py-2 rounded-lg font-semibold transition-all duration-200
               {{ request()->routeIs('client') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
               Clients
            </a>

            <!-- CAREERS -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" @click.away="open = false"
                    class="px-2 xl:px-3 py-2 rounded-lg font-semibold flex items-center transition-all duration-200
                    {{ request()->is('careers*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                    Join Us
                    <svg class="w-4 h-4 ml-1 transform transition-transform duration-200"
                         :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-transition
                     class="absolute bg-white shadow-xl rounded-xl mt-2 w-56 z-50 border border-gray-100 overflow-hidden left-1/2 -translate-x-1/2">

                    <a href="{{ route('careers.why') }}" class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white">
                        Why Join Us
                    </a>

                    <a href="{{ route('careers.job') }}" class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white">
                        Job Vacancy
                    </a>

                    <a href="{{ route('careers.internship') }}" class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white">
                        Internship
                    </a>
                </div>
            </div>

            <a href="{{ route('gallary.video') }}"
               class="px-2 xl:px-3 py-2 rounded-lg font-semibold transition-all duration-200
               {{ request()->routeIs('gallary.video') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
               Gallery
            </a>

            <!-- ABOUT -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" @click.away="open = false"
                    class="px-2 xl:px-3 py-2 rounded-lg font-semibold flex items-center transition-all duration-200
                    {{ request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                    About Us
                    <svg class="w-4 h-4 ml-1 transform transition-transform duration-200"
                         :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-transition
                     class="absolute bg-white shadow-xl rounded-xl mt-2 w-56 z-50 border border-gray-100 overflow-hidden left-1/2 -translate-x-1/2">

                    <a href="{{ route('about') }}" class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white">
                        About Us
                    </a>

                    <a href="{{ route('contact.index') }}" class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white">
                        Contact
                    </a>

                    <a href="{{ route('howItWorks') }}" class="block px-4 py-2 font-semibold hover:bg-indigo-600 hover:text-white">
                        How We Work
                    </a>
                </div>
            </div>

        </nav>

        <!-- DOWNLOAD BUTTON DESKTOP -->
        <div class="hidden lg:flex items-center justify-end lg:w-1/4 pr-2">
            <a href="{{ $profile }}" target="_blank" download
               class="px-6 py-2.5 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-800 transition-all duration-200 shadow-md inline-block text-center whitespace-nowrap">
                Download Profile
            </a>
        </div>

        <!-- MOBILE BUTTON -->
        <div class="lg:hidden flex items-center">
            <button @click="openMenu = !openMenu"
                    class="text-gray-700 focus:outline-none p-2 rounded-lg hover:bg-gray-100">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

    </div>

    <!-- MOBILE MENU -->
<div x-show="openMenu"
     x-data="{ 
        activeMenu: '{{ 
            request()->is('services*') ? 'services' : 
            (request()->is('careers*') ? 'careers' : 
            (request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'about' : null)) 
        }}' 
     }"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 -translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-150"
     class="lg:hidden bg-white/95 backdrop-blur-lg shadow-md border-t border-gray-100 z-40 overflow-y-auto max-h-[calc(100vh-80px)]">

    <div class="px-3 pt-3 pb-8 space-y-1">

        <!-- HOME -->
        <div class="px-2 pt-2">
            <a href="{{ route('home') }}"
               class="block px-4 py-3 font-semibold rounded-lg
               {{ request()->routeIs('home') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                Home
            </a>
        </div>

        <!-- SERVICES -->
        <div class="px-2">
            <button @click="activeMenu = (activeMenu === 'services' ? null : 'services')"
                class="w-full text-left px-4 py-3 font-semibold flex justify-between items-center rounded-lg transition-all duration-200
                {{ request()->is('services*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                Services
                <svg class="w-4 h-4 ml-2 transform transition-transform duration-200"
                     :class="{ 'rotate-180': activeMenu === 'services' }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="activeMenu === 'services'" x-transition class="bg-gray-50/50 rounded-b-lg mx-2">

                <a href="{{ route('sIndex') }}"
                   class="block px-8 py-2 text-sm font-semibold rounded-lg
                   {{ request()->routeIs('sIndex') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100' }}">
                    All Services
                </a>

                @foreach($mainServices as $service)
                    <a href="{{ route('services.show', $service->slug) }}"
                       class="block px-8 py-2 text-sm font-semibold rounded-lg
                       {{ request()->is('services/'.$service->slug) ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100' }}">
                        {{ $service->title }}
                    </a>
                @endforeach

            </div>
        </div>

        <!-- PROJECTS -->
        <div class="px-2">
            <a href="{{ route('pIndex') }}"
               class="block px-4 py-3 font-semibold rounded-lg
               {{ request()->routeIs('pIndex') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                Our Projects
            </a>
        </div>

        <!-- CLIENTS -->
        <div class="px-2">
            <a href="{{ route('client') }}"
               class="block px-4 py-3 font-semibold rounded-lg
               {{ request()->routeIs('client') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                Clients
            </a>
        </div>

        <!-- CAREERS -->
<!-- CAREERS MOBILE -->
<div class="px-2">
    <button @click="activeMenu = (activeMenu === 'careers' ? null : 'careers')"
            class="w-full text-left px-4 py-3 font-semibold flex justify-between items-center transition-all duration-200 rounded-lg
            {{ request()->is('careers*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        Join Us
        <svg class="w-4 h-4 ml-2 transform transition-transform duration-200"
             :class="{ 'rotate-180': activeMenu === 'careers' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Submenu -->
    <div x-show="activeMenu === 'careers' || {{ request()->is('careers*') ? 'true' : 'false' }}"
         x-transition
         class="bg-gray-50/50 rounded-b-lg mx-2">
        <a href="{{ route('careers.why') }}"
           class="block px-8 py-2 text-sm font-semibold transition-colors
           {{ request()->routeIs('careers.why') ? 'bg-indigo-100 text-indigo-800' : 'hover:bg-indigo-50 hover:text-indigo-700' }}">
            Why Join Us
        </a>

        <a href="{{ route('careers.job') }}"
           class="block px-8 py-2 text-sm font-semibold transition-colors
           {{ request()->routeIs('careers.job') ? 'bg-indigo-100 text-indigo-800' : 'hover:bg-indigo-50 hover:text-indigo-700' }}">
            Job Vacancy
        </a>

        <a href="{{ route('careers.internship') }}"
           class="block px-8 py-2 text-sm font-semibold transition-colors
           {{ request()->routeIs('careers.internship') ? 'bg-indigo-100 text-indigo-800' : 'hover:bg-indigo-50 hover:text-indigo-700' }}">
            Internship
        </a>
    </div>
</div>

        <!-- GALLERY -->
        <div class="px-2">
            <a href="{{ route('gallary.video') }}"
               class="block px-4 py-3 font-semibold rounded-lg
               {{ request()->routeIs('gallary.video') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                Gallery
            </a>
        </div>

        <!-- ABOUT -->
        <div class="px-2">
            <button @click="activeMenu = (activeMenu === 'about' ? null : 'about')"
                class="w-full text-left px-4 py-3 font-semibold flex justify-between items-center rounded-lg transition-all duration-200
                {{ request()->is('about*') || request()->routeIs('contact.index') || request()->routeIs('howItWorks') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                About Us
                <svg class="w-4 h-4 ml-2 transform transition-transform duration-200"
                     :class="{ 'rotate-180': activeMenu === 'about' }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="activeMenu === 'about'" x-transition class="bg-gray-50/50 rounded-b-lg mx-2">

                <a href="{{ route('about') }}"
                   class="block px-8 py-2 text-sm font-semibold rounded-lg
                   {{ request()->routeIs('about') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100' }}">
                    About Us
                </a>

                <a href="{{ route('contact.index') }}"
                   class="block px-8 py-2 text-sm font-semibold rounded-lg
                   {{ request()->routeIs('contact.index') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100' }}">
                    Contact
                </a>

                <a href="{{ route('howItWorks') }}"
                   class="block px-8 py-2 text-sm font-semibold rounded-lg
                   {{ request()->routeIs('howItWorks') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100' }}">
                    How We Work
                </a>

            </div>
        </div>

        <!-- DOWNLOAD -->
        <div class="px-4 py-4">
            <a href="{{ $profile }}" target="_blank" download
               class="block w-full py-3 text-center rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition duration-200 shadow-md">
                Download Profile
            </a>
        </div>

    </div>
</div>

</header>