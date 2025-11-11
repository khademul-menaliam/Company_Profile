      <!-- Logo -->
  {{-- <a href="{{ url('/') }}" class="flex items-center space-x-2">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
      <span class="font-bold text-lg text-gray-800">AR Engineering</span>
    </a> --}}
<header x-data="{ openMenu: false, openServices: false, openCareers: false }"
        class="bg-white/90 backdrop-blur-md shadow-md fixed top-0 left-0 w-full z-50 border-b border-gray-200">
  <div class="container mx-auto flex justify-between items-center py-4 px-6">
    <!-- Logo -->

    <a href="{{ url('/') }}" class="flex text-2xl font-extrabold text-indigo-700 tracking-tight space-x-2">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto"><span>AR ENGINEERING</span>
    </a>
    <!-- Desktop Menu -->
    <nav class="hidden lg:flex space-x-2 items-center relative">
      @php $current = request()->path(); @endphp

      <!-- Reusable Nav Item -->
      <a href="{{ url('/') }}"
         class="px-3 py-2 rounded-lg font-semibold transition-all duration-200
                {{ request()->routeIs('home') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
         Home
      </a>


        <!-- Services Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="px-3 py-2 rounded-lg font-semibold flex items-center transition-all duration-200
                {{ request()->routeIs('sIndex') || request()->is('services/*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                Services
                <svg class="w-4 h-4 ml-1 transform transition-transform duration-200"
                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            @php
                use App\Models\Service;
                $mainServices = Service::whereNull('parent_id')
                    ->where('status', true)
                    ->orderBy('sort_order', 'asc')
                    ->take(3)
                    ->get(['title', 'slug']);
            @endphp

            <!-- Dropdown Menu -->
            <div x-show="open"
                @click.away="open = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="absolute bg-white shadow-xl rounded-xl mt-2 w-72 z-50 border border-gray-100 overflow-hidden">

                {{-- All Services Link --}}
                <a href="{{ route('sIndex') }}"
                class="block px-4 py-2 font-semibold transition
                {{ request()->routeIs('sIndex') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-600 hover:text-white' }}">
                    All Services
                </a>

                {{-- Dynamic Main Services --}}
                @foreach($mainServices as $service)
                    <a href="{{ route('services.show', $service->slug) }}"
                    class="block px-4 py-2 font-semibold transition
                    {{ request()->is('services/'.$service->slug) ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-600 hover:text-white' }}">
                        {{ $service->title }}
                    </a>
                @endforeach
            </div>
        </div>



      <a href="{{ route('pIndex') }}"
         class="px-3 py-2 rounded-lg font-semibold transition-all duration-200
                {{ request()->routeIs('pIndex')  ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
         Our Projects
      </a>

      <a href="{{ route('client') }}"
         class="px-3 py-2 rounded-lg font-semibold transition-all duration-200
                {{ request()->routeIs('client')  ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
         Clients
      </a>

    <!-- Careers Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="px-3 py-2 rounded-lg font-semibold flex items-center transition-all duration-200
                {{ request()->routeIs('careers.why') || request()->routeIs('careers.job') || request()->routeIs('careers.internship') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
                Careers
                <svg class="w-4 h-4 ml-1 transform transition-transform duration-200"
                    :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open"
                @click.away="open = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="absolute bg-white shadow-xl rounded-xl mt-2 w-56 z-50 border border-gray-100 overflow-hidden">

                <a href="{{ route('careers.why') }}"
                class="block px-4 py-2 font-semibold transition
                {{ request()->routeIs('careers.why') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-600 hover:text-white' }}">
                    Why Join Us
                </a>

                <a href="{{ route('careers.job') }}"
                class="block px-4 py-2 font-semibold transition
                {{ request()->routeIs('careers.job') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-600 hover:text-white' }}">
                    Job Vacancy
                </a>

                <a href="{{ route('careers.internship') }}"
                class="block px-4 py-2 font-semibold transition
                {{ request()->routeIs('careers.internship') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-600 hover:text-white' }}">
                    Internship
                </a>
            </div>
        </div>

      <a href="{{ route('contact.index')  }}"
         class="px-3 py-2 rounded-lg font-semibold transition-all duration-200
                {{ request()->routeIs('contact.index') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
         Contact
      </a>

        <a href="{{ url('/about') }}"
         class="px-3 py-2 rounded-lg font-semibold transition-all duration-200
                {{ request()->routeIs('about') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
         About Us
      </a>
    </nav>

    <!-- Mobile Toggle -->
    <button @click="openMenu = !openMenu" class="lg:hidden text-gray-700 focus:outline-none">
      <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7" />
      </svg>
    </button>
  </div>

    <!-- Mobile Menu -->
    <div x-show="openMenu"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-white/95 backdrop-blur-lg shadow-md border-t border-gray-100 z-40">

    <!-- Home -->
    <a href="{{ route('home')  }}"
        class="block px-4 py-3 font-semibold {{ request()->is('/') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        Home
    </a>



    <!-- Services Dropdown -->
    <div x-data="{ open: false }">
        <button @click="open = !open"
                class="w-full text-left px-4 py-3 font-semibold flex justify-between items-center
                    {{ request()->is('services*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        Services
        <svg class="w-4 h-4 ml-2 transform transition-transform duration-200"
            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
        </svg>
        </button>

        <div x-show="open" x-transition class="bg-gray-50">
        <a href="{{ route('sIndex') }}"
            class="block px-8 py-2 text-sm font-semibold {{ request()->routeIs('sIndex') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
            All Services
        </a>

        @foreach($mainServices as $service)
            <a href="{{ route('services.show', $service->slug) }}"
            class="block px-8 py-2 text-sm font-semibold {{ request()->is('services/'.$service->slug) ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
            {{ $service->title }}
            </a>
        @endforeach
        </div>
    </div>

    <!-- Projects -->
    <a href="{{ route('pIndex') }}"
        class="block px-4 py-3 font-semibold {{ request()->is('projects*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        Our Projects
    </a>

    <!-- Clients -->
    <a href="{{ route('client') }}"
        class="block px-4 py-3 font-semibold {{ request()->is('client*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        Clients
    </a>

    <!-- Careers Dropdown -->
    <div x-data="{ open: false }">
        <button @click="open = !open"
                class="w-full text-left px-4 py-3 font-semibold flex justify-between items-center
                    {{ request()->routeIs('careers.why') || request()->routeIs('careers.job') || request()->routeIs('careers.internship') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        Join Us
        <svg class="w-4 h-4 ml-2 transform transition-transform duration-200"
            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
        </svg>
        </button>

        <div x-show="open" x-transition class="bg-gray-50">
        <a href="{{ route('careers.why') }}"
            class="block px-8 py-2 text-sm font-semibold {{ request()->routeIs('careers.why') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
            Why Join Us
        </a>
        <a href="{{ route('careers.job') }}"
            class="block px-8 py-2 text-sm font-semibold {{ request()->routeIs('careers.job') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
            Job Vacancy
        </a>
        <a href="{{ route('careers.internship') }}"
            class="block px-8 py-2 text-sm font-semibold {{ request()->routeIs('careers.internship') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
            Internship
        </a>
        </div>
    </div>

    <!-- Contact -->
    <a href="{{ route('contact.index') }}"
        class="block px-4 py-3 font-semibold {{ request()->is('contact') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        Contact
    </a>
        <!-- About -->
    <a href="{{ route('about')  }}"
        class="block px-4 py-3 font-semibold {{ request()->is('about') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-100 hover:text-indigo-700' }}">
        About Us
    </a>
    </div>

</header>

<!-- Prevent content overlap -->
{{-- <div class="pt-24"></div> --}}
