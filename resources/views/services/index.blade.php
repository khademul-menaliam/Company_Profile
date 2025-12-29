@extends('layouts.app')
@section('title', 'Our Services | AR Engineering')

@section('content')
<!-- Card/List Section: only list of services -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-12 text-indigo-700">Our Services</h1>

        @if($services->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col">
                
                @if($service->image)
                <img src="{{ asset($service->image) }}" 
                     alt="{{ $service->title }}" 
                     class="w-full h-56 object-cover">
                @endif

                <div class="p-6 flex flex-col">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $service->title }}</h3>

                    @if($service->children->isNotEmpty())
                    <ul class="text-gray-600 text-sm list-disc list-inside space-y-1 mb-3">
                        @foreach($service->children as $child)
                        <li>{{ $child->title }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <a href="{{ route('services.show', $service->slug) }}" 
                       class="mt-2 inline-block text-indigo-600 font-semibold hover:underline">
                        Read More
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white border border-gray-300 rounded-xl p-12 text-center shadow flex flex-col items-center justify-center">
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

<!-- Main Service Sections (Excerpt only) -->
@foreach($services as $service)
<section class="py-16 bg-white border-t border-gray-200">
    <div class="container mx-auto px-4 md:px-0">
        <div class="flex flex-col md:flex-row items-center gap-12">
            @if($service->image)
            <div class="md:w-1/2 w-full flex justify-center">
                <img src="{{ asset($service->image) }}" 
                     alt="{{ $service->title }}" 
                     class="w-full max-h-[400px] object-cover rounded-3xl shadow-lg hover:scale-105 transition-transform duration-500">
            </div>
            @endif
            <div class="md:w-1/2 w-full text-gray-700">
                <h2 class="text-3xl font-bold text-indigo-700 mb-4">{{ $service->title }}</h2>
                <div class="prose max-w-none text-gray-600 leading-relaxed">
                    {{-- Show short excerpt instead of full content --}}
                    {{ Str::words(strip_tags($service->content), 40, '...') }}
                </div>
                <a href="{{ route('services.show', $service->slug) }}" 
                   class="mt-6 inline-block text-indigo-600 font-semibold hover:underline">
                    Read More
                </a>
            </div>
        </div>

        @if($service->children->count() > 0)
        <div class="mt-16">
            <h3 class="text-3xl font-bold text-gray-800 text-center mb-8">Related Services</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($service->children as $sub)
                <div class="bg-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
                    <div class="p-6 flex flex-col">
                        <h4 class="text-xl font-semibold mb-3 border-b pb-2">{{ $sub->title }}</h4>
                        <div class="text-gray-600 text-sm leading-relaxed prose max-w-none">
                            {!! Str::words(strip_tags($sub->content), 30, '...') !!}
                        </div>
                        <a href="{{ route('services.show', $sub->slug) }}" 
                           class="mt-2 inline-block text-indigo-600 font-semibold hover:underline">
                            Show More
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endforeach

<!-- Call to Action -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-semibold mb-4 text-gray-800">Explore Other Services</h2>
        <p class="mb-6 text-gray-600">Check out our other services that might interest you.</p>
        <a href="{{ route('sIndex') }}" class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded shadow hover:bg-indigo-700 transition duration-300">View All Services</a>
    </div>
</section>
@endsection
