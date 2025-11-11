@extends('layouts.app')
@section('title', 'Our Services | AR Engineering')

@section('content')
<section class="py-0 bg-gray-50">
  <div class="container mx-auto px-4">
    <h1 class="text-4xl font-bold text-center mb-12">Our Services</h1>
    @if($services->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($services as $service)
            <div class="bg-white rounded-xl shadow-md text-left hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                @if($service->image)
                <img src="{{ asset($service->image) }}"
                    alt="{{ $service->title }}"
                    class="w-full h-48 object-cover rounded-lg mb-4">
                @endif
                <div class="p-6">
                <h3 class="font-semibold text-xl mb-2 text-gray-800 space-y-1 pl-4 text-left">{{ $service->title }}</h3>
                {{-- fix with padding in middle --}}
                {{-- @if($service->children->isNotEmpty())
                <ul class="text-gray-600 text-sm mb-4 list-disc list-inside space-y-1 text-left mx-auto w-fit pl-4">
                    @foreach($service->children as $child)
                    <li>{{ $child->title }}</li>
                    @endforeach
                </ul>
                @endif --}}

                @if($service->children->isNotEmpty())
                <ul class="text-gray-600 text-sm mb-4 list-disc list-inside space-y-1 pl-4 text-left">
                    @foreach($service->children as $child)
                    <li>{{ $child->title }}</li>
                    @endforeach
                </ul>
                @endif
                <a href="{{ route('services.show', $service->slug)  }}"
                class="text-indigo-600 font-semibold mt-2 inline-block hover:underline space-y-1 pl-4  ">
                Read More
                </a>
                </div>
            </div>
        @endforeach
      </div>
    @else
      {{-- No services found --}}
    <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center">
        <!-- Box for icon -->
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
            <!-- Normal icon -->
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

<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4 md:px-0">
    @foreach($services as $service)

    <!-- Main Service Title -->
    <h1 class="text-4xl font-bold mb-6 text-left text-indigo-700">{{ $service->title }}</h1>

    <div class="container mx-auto px-4 py-8">
        <!-- Service Section -->
        <div class="flex flex-col md:flex-row items-start md:items-center gap-8">

            <!-- Hero Image -->
            @if($service->image)
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ asset($service->image) }}"
                    alt="{{ $service->title }}"
                    class="w-full max-h-[400px] object-cover rounded-2xl shadow-lg">
            </div>
            @endif

            <!-- Service Description -->
            <div class="w-full md:w-1/2 text-gray-700 leading-relaxed">
                <h1 class="text-2xl font-bold mb-4">{{ $service->title }}</h1>
                <div class="prose max-w-none">
                    {!! $service->content !!}
                </div>
            </div>
        </div>
    </div>

<!-- Children Services -->
@if($service->children->count() > 0)
<section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
        Related Services
    </h2>

    <!-- Grid Layout: 1 column on mobile, 2 on desktop -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($service->children as $sub)
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col justify-between">

            <!-- Card Content -->
            <div class="p-6">
                <!-- Title -->
                <h3 class="text-xl font-semibold text-gray-800 mb-3 border-b pb-2">
                    {{ $sub->title }}
                </h3>

                <!-- Short Description -->
                {{-- <div class="text-gray-600 text-sm leading-relaxed line-clamp-6 prose max-w-none">
                    {!! Str::limit(strip_tags($sub->content), 300, '...') !!}
                </div> --}}
                <div class="text-gray-600 text-sm leading-relaxed prose max-w-none">
                    {!! Str::words(strip_tags($sub->content), 150, '...') !!}
                </div>
            </div>

            <!-- Show More Button -->
            <div class="p-6 pt-0">
                <a href="{{ route('services.show', $sub->slug) }}"
                   class="inline-block px-5 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                   Show More
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

    @endforeach

        <!-- Call to Action -->
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-semibold mb-4 text-gray-800">Explore Other Services</h2>
      <p class="mb-6 text-gray-600">Check out our other services that might interest you.</p>
      <a href="{{ route('sIndex') }}" class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded shadow hover:bg-indigo-700 transition duration-300">View All Services</a>
    </div>
  </div>
</section>
@endsection
