@extends('layouts.app')
@section('title', 'Home | AR Engineering')

@section('content')
{{-- Hero Section --}}
<section class="relative overflow-hidden h-[80vh]" x-data="heroSlider()">

  <!-- Slides -->
  <template x-for="(slide, index) in slides" :key="index">
    <div x-show="current === index"
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-1000"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="absolute inset-0 bg-cover bg-center flex items-center justify-center"
         :style="`background-image: url(${slide.image});`">

      <!-- Overlay -->
      <div class="absolute inset-0 bg-black/40"></div>

      <!-- Text -->
      <div class="text-center relative z-10 px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" x-text="slide.title"></h1>
        <p class="text-lg md:text-xl text-white mb-6" x-text="slide.subtitle"></p>
        <a :href="slide.link"
           class="bg-white text-indigo-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300">
          {{ __('Explore Services') }}
        </a>
      </div>
    </div>
  </template>

  <!-- Controls -->
  <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
    <template x-for="(slide, index) in slides" :key="index">
      <button @click="current = index"
              class="w-3 h-3 rounded-full"
              :class="current === index ? 'bg-white' : 'bg-gray-400'"></button>
    </template>
  </div>
</section>

<!-- History Section -->
<section class="py-16">
    <div class="container mx-auto px-4 md:px-0 max-w-6xl flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/2">
            <img src="{{ asset('images/hero2.jpg') }}" alt="Company History" class="rounded shadow-lg">
        </div>
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold mb-4">Our History</h2>
            <p class="text-gray-700 leading-relaxed mb-2">
                AR Engineering was founded in [Year] with a vision to provide top-notch industrial engineering solutions. Over the years, we have successfully completed numerous projects in MEP design, fire safety, HVAC, boilers, and more.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Our commitment to innovation and excellence has made us a trusted partner for industrial clients across Bangladesh.
            </p>
        </div>
    </div>
</section>

<!-- Message from Advisor and CEO -->
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 md:px-0 max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="bg-white p-6 rounded shadow text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Advisor" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
            <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
            <p class="text-gray-700 mb-2">“Our philosophy is grounded in delivering engineering solutions that are both innovative and practical. We focus on quality, safety, and efficiency in every project.”</p>
            <p class="font-semibold">Senior Advisor</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <img src="{{ asset('images/logo.png') }}" alt="CEO" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
            <h3 class="text-xl font-bold mb-2">Message from Our CEO</h3>
            <p class="text-gray-700 mb-2">“AR Engineering is committed to shaping the future of industrial solutions. Our team strives to exceed client expectations in every aspect of our services.”</p>
            <p class="font-semibold">CEO</p>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="py-8 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold mb-10 text-center text-gray-800">Our Services</h2>

    @if($services->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        @foreach($services as $service)
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            @if($service->image)
            <img src="{{ asset($service->image) }}"
                alt="{{ $service->title }}"
                class="w-full h-40 object-cover rounded-lg mb-4">
            @endif

            <h3 class="font-semibold text-xl mb-2 text-gray-800">{{ $service->title }}</h3>

            @if($service->children->isNotEmpty())
            <ul class="text-gray-600 text-sm mb-4 list-disc list-inside space-y-1 text-left mx-auto w-fit pl-4">
                @foreach($service->children as $child)
                <li>{{ $child->title }}</li>
                @endforeach
            </ul>
            @endif
        {{-- fix with padding in left --}}
            {{-- @if($service->children->isNotEmpty())
            <ul class="text-gray-600 text-sm mb-4 list-disc list-inside space-y-1 pl-4 text-left">
                @foreach($service->children as $child)
                <li>{{ $child->title }}</li>
                @endforeach
            </ul>
            @endif --}}
            <a href="{{ url('/services/'.$service->slug) }}"
            class="text-indigo-600 font-semibold mt-3 inline-block hover:underline">
            Read More
            </a>
        </div>
        @endforeach
      </div>

      {{-- Centered See All Button --}}
      <div class="mt-12 flex justify-center">
        <a href="{{ route('sIndex') }}"
           class="bg-indigo-600 text-white font-semibold px-8 py-3 rounded-full shadow-md hover:bg-indigo-700 hover:shadow-lg transition-all duration-300">
          See All Services
        </a>
      </div>

    @else
      <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7M4 13h16v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-700">No Services Available</h3>
        <p class="text-gray-500 max-w-xs">We currently have no services listed. Please check back later.</p>
      </div>
    @endif
  </div>
</section>

{{-- Projects Section --}}
<section class="py-8 bg-white">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold mb-10 text-center text-gray-800">Our Projects</h2>

    @if($projects->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($projects as $project)
          <div class="bg-gray-50 rounded-xl shadow-md p-6 text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            @if($project->image)
              <img src="{{ asset('storage/'.$project->image) }}"
                   alt="{{ $project->title }}"
                   class="w-full h-40 object-cover rounded-lg mb-4">
            @endif
            <h3 class="font-semibold text-xl mb-2 text-gray-800">{{ $project->title }}</h3>
            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 100) }}</p>
            <a href="{{ url('/projects/'.$project->slug) }}"
               class="text-indigo-600 font-semibold mt-3 inline-block hover:underline">
              View Details
            </a>
          </div>
        @endforeach
      </div>

      {{-- Centered See All Button --}}
      <div class="mt-12 flex justify-center">
        <a href="{{ route('pIndex') }}"
           class="bg-indigo-600 text-white font-semibold px-8 py-3 rounded-full shadow-md hover:bg-indigo-700 hover:shadow-lg transition-all duration-300">
          See All Projects
        </a>
      </div>

    @else
      <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7M4 13h16v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-700">No Projects Available</h3>
        <p class="text-gray-500 max-w-xs">We currently have no projects listed. Please check back later.</p>
      </div>
    @endif
  </div>
</section>


<!-- Clients & Partners Section -->
<section class="py-8 bg-gray-50">
<div class="container mx-auto px-6">

<!-- Our Clients -->
<div class="mb-20">
  <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
    Our Valued Clients
  </h2>

  @if($clients->count() > 0)
    <div class="relative">
        <!-- Left Arrow -->
        <button class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-indigo-600 hover:bg-indigo-800 rounded-full p-2 z-10" id="scrollLeft">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>

        <!-- Right Arrow -->
        <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-indigo-600 hover:bg-indigo-800 rounded-full p-2 z-10" id="scrollRight">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <!-- Client Cards Container -->
        <div class="flex overflow-x-hidden scroll-smooth gap-10 py-4 px-4 justify-center items-center" id="clientContainer">
            @foreach ($clients as $client)
                <div class="group bg-white border border-gray-200 rounded-2xl p-8
                            hover:shadow-2xl hover:-translate-y-2
                            transition-all duration-300 ease-in-out flex flex-col items-center justify-center w-40 h-36">
                    <img src="{{ asset('storage/' . $client->logo) }}"
                         alt="{{ $client->name }}"
                         class="w-32 h-16 object-contain opacity-75 group-hover:opacity-100 group-hover:scale-105 transition-all duration-300 mb-3">
                    <p class="text-gray-700 font-bold text-sm text-center group-hover:text-indigo-600 transition-colors duration-300">
                        {{ $client->name }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- See All Clients Button -->
    <div class="mt-8 flex justify-center">
        <a href="{{ route('client') }}"
            class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded-full shadow-md hover:bg-indigo-700 transition-all duration-300">
            See All Clients
        </a>
    </div>
  @else
    <div class="flex justify-center">
        <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center max-w-md">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12 20.5A8.5 8.5 0 103.5 12 8.5 8.5 0 0012 20.5z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-gray-700">No Clients Found</h3>
            <p class="text-gray-500 text-sm">Please check back later for updates.</p>
        </div>
    </div>
  @endif
</div>




      {{-- @else --}}
    <!-- No Clients -->
        {{-- <div class="flex justify-center">
          <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center max-w-md">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 20.5A8.5 8.5 0 103.5 12 8.5 8.5 0 0012 20.5z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-gray-700">No Clients Found</h3>
            <p class="text-gray-500 text-sm">Please check back later for updates.</p>
          </div>
        </div>
      @endif
    </div> --}}

    <!-- Our Partners -->
    <div>
      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
        Our Solution Partners
      </h2>

      @if(!empty($partners) && count($partners) > 0)
        <div class="flex flex-wrap justify-center gap-10">
          @foreach ($partners as $partner)
            <div class="group bg-white border border-gray-200 rounded-2xl p-8
                        hover:shadow-2xl hover:-translate-y-2
                        transition-all duration-300 ease-in-out flex flex-col items-center justify-center w-52 h-44">
              <img src="{{ asset('storage/' . $partner['logo']) }}"
                   alt="{{ $partner['name'] }}"
                   class="w-32 h-16 object-contain opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-300 mb-3">
              <p class="text-gray-700 font-semibold text-sm text-center group-hover:text-indigo-600 transition-colors duration-300">
                {{ $partner['name'] }}
              </p>
            </div>
          @endforeach
        </div>
        <!-- See All partner Button -->
        <div class="mt-12 flex justify-center">
          <a href="{{ route('client') }}"
             class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded-full shadow-md hover:bg-indigo-700 transition-all duration-300">
            See All Partners
          </a>
        </div>
      @else
        <div class="flex justify-center">
          <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center max-w-md">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 20.5A8.5 8.5 0 103.5 12 8.5 8.5 0 0012 20.5z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-gray-700">No Partners Found</h3>
            <p class="text-gray-500 text-sm">Please check back later for updates.</p>
          </div>
        </div>
      @endif
    </div>

  </div>
</section>

{{-- Hero section script --}}
<script>
function heroSlider() {
    return {
        current: 0,
        slides: [
            {
                image: '{{ asset("images/hero1.jpg") }}',
                title: 'Your Vision, Our Engineering',
                subtitle: 'Providing innovative industrial engineering solutions.',
                link: '{{ url("/services") }}'
            },
            {
                image: '{{ asset("images/hero2.jpg") }}',
                title: 'Consulting & Projects',
                subtitle: 'Expertise in MEP design, simulation, and installations.',
                link: '{{ url("/services") }}'
            },
            {
                image: '{{ asset("images/hero3.jpg") }}',
                title: 'Maintenance & Services',
                subtitle: 'Reliable support for all industrial systems.',
                link: '{{ url("/services") }}'
            }
        ],
        init() {
            setInterval(() => {
                this.current = (this.current + 1) % this.slides.length;
            }, 10000); // change slide every 10s
        }
    }
}
</script>

<script>
    document.getElementById('scrollLeft').addEventListener('click', function() {
  const container = document.getElementById('clientContainer');
  const clientWidth = container.scrollWidth / container.children.length;
  const currentScroll = container.scrollLeft;

  // If we are at the first client, scroll to the last client (loop)
  if (currentScroll === 0) {
    container.scrollLeft = container.scrollWidth - clientWidth;
  } else {
    container.scrollBy({
      left: -clientWidth, // Scroll left by the width of one client card
      behavior: 'smooth'
    });
  }
});

document.getElementById('scrollRight').addEventListener('click', function() {
  const container = document.getElementById('clientContainer');
  const clientWidth = container.scrollWidth / container.children.length;
  const currentScroll = container.scrollLeft;

  // If we are at the last client, scroll to the first client (loop)
  if (currentScroll + container.offsetWidth >= container.scrollWidth) {
    container.scrollLeft = 0;
  } else {
    container.scrollBy({
      left: clientWidth, // Scroll right by the width of one client card
      behavior: 'smooth'
    });
  }
});

</script>
@endsection
