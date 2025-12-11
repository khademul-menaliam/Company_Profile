@extends('layouts.app')
@section('title', $service->title . ' | AR Engineering')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gray-900 h-[45vh] flex items-center justify-center">
    <div class="absolute inset-0">
        @if($service->image)
            <img src="{{ asset($service->image) }}"
                 alt="{{ $service->title }}"
                 class="w-full h-full object-cover opacity-60">
        @else
            <div class="w-full h-full bg-gray-800"></div>
        @endif
    </div>

    <div class="relative z-10 text-center px-4">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow-lg">
            {{ $service->title }}
        </h1>
        <p class="text-gray-200 mt-4 max-w-2xl mx-auto">
            Professional solutions delivered with engineering excellence.
        </p>
    </div>
</section>

<!-- Main Content Area -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 md:px-0">

        <!-- Main Service Description -->
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl p-8 mb-12">
            <h2 class="text-3xl font-bold text-indigo-700 mb-6 border-l-4 border-indigo-600 pl-4">
                Overview
            </h2>
            <div class="prose prose-indigo max-w-none text-gray-700">
                {!! $service->content !!}
            </div>
        </div>

        <!-- Sub-Services Section -->
        @if($service->children->count() > 0)
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">
                Solutions Under This Service
            </h2>

            <div class="space-y-10 px-4">
                @foreach($service->children as $sub)
                    <div class="bg-white shadow-md hover:shadow-xl transition rounded-xl overflow-hidden border">

                        <!-- Sub Service Header -->
                        @if($sub->image)
                        <div class="h-80 overflow-hidden">
                            <img src="{{ asset($sub->image) }}"
                                 class="w-full h-full object-cover object-center hover:scale-105 transition duration-500">
                        </div>
                        @endif

                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-indigo-600 mb-4">
                                {{ $sub->title }}
                            </h3>
                            <div class="text-gray-700 leading-relaxed mb-6 prose max-w-none">
                                {!! $sub->content !!}
                            </div>

                            <!-- Features -->
                            @if(!empty($sub->features))
                            <div class="mb-6">
                                <h4 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-indigo-600 rounded-full"></span> Features
                                </h4>
                                <ul class="space-y-2">
                                    @foreach($sub->features as $feature)
                                    <li class="bg-gray-100 px-4 py-2 rounded-lg">
                                        <strong class="text-indigo-700">{{ $feature['title'] }}:</strong>
                                        {{ $feature['description'] }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Benefits -->
                            @if(!empty($sub->benefits))
                            <div class="bg-indigo-50 p-6 rounded-xl mb-6">
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">
                                    Benefits
                                </h4>
                                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                                    @foreach($sub->benefits as $benefit)
                                        <li>{{ $benefit }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Gallery -->
                            @if(!empty($sub->gallery))
                            <div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">
                                    Gallery
                                </h4>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach($sub->gallery as $image)
                                    <div class="relative group">
                                        <img src="{{ asset($image) }}"
                                             class="w-full h-40 object-cover rounded-lg shadow-md group-hover:scale-105 transition duration-300 cursor-pointer"
                                             onclick="openModal('{{ asset($image) }}')">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- CTA -->
        <div class="mt-16 text-center">
            <h2 class="text-3xl font-bold text-gray-900">
                Explore Other Solutions
            </h2>
            <p class="text-gray-600 mt-2 mb-6">
                Discover more of what AR Engineering can deliver for your business.
            </p>
            <a href="{{ route('sIndex') }}"
               class="bg-indigo-600 text-white px-10 py-3 rounded-lg shadow-lg hover:bg-indigo-700 transition">
                View All Services
            </a>
        </div>

    </div>
</section>

@endsection
