@extends('layouts.app')
@section('title', 'Gallery | AR Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-16 text-center overflow-hidden">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Our Gallery</h1>
        <p class="text-lg md:text-xl max-w-2xl mx-auto">
            Explore our projects, innovations, and milestones captured through our gallery.
        </p>
    </div>
    <div class="absolute inset-0 bg-[url('/images/gallery-bg.jpg')] bg-cover bg-center opacity-10"></div>
</section>

<!-- Gallery Section -->
    <section class="py-20 bg-gray-50" x-data="{ 
        lightboxOpen: false, 
        activeSrc: '', 
        isVideo: false,
        openLightbox(src) { 
            this.activeSrc = src; 
            // Check if it's a video by extension
            this.isVideo = ['mp4','webm','ogg','avi'].some(ext => src.toLowerCase().endsWith(ext));
            this.lightboxOpen = true; 
            document.body.classList.add('overflow-hidden');
        },
        closeLightbox() { 
            this.lightboxOpen = false; 
            this.activeSrc = ''; 
            this.isVideo = false;
            document.body.classList.remove('overflow-hidden');
        }
    }">

        <div class="container mx-auto px-6">

            @php
                $images = $galleryItems->filter(fn($item) => !$item->isVideo());
                $videos = $galleryItems->filter(fn($item) => $item->isVideo());
            @endphp

            <!-- Images Section -->
            @if($images->count() > 0)
            <div class="mb-24">
                <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Projects & Photos</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($images as $item)
                    <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 cursor-pointer"
                        {{-- @click="openLightbox('{{ asset($item->image) }}')"> --}}
                        
                        <div class="relative overflow-hidden h-64">
                            {{-- <img src="{{ asset($item->image) }}" 
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"> --}}
                            
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <svg class="w-10 h-10 text-white opacity-90 block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        <!-- Videos Section -->
        @if($videos->count() > 0)
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Video Highlights</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($videos as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 cursor-pointer"
                     @click="openLightbox('{{ asset($item->image) }}')">
                    <div class="aspect-w-16 aspect-h-9">
                        <video controls class="w-full h-full object-cover">
                            <source src="{{ asset($item->image) }}" type="{{ $item->getMimeType() }}">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="p-4 bg-gray-50 flex items-center justify-center">
                         <span class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>
                            Highlight Video
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($images->isEmpty() && $videos->isEmpty())
        <div class="flex justify-center py-10">
            <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center max-w-md">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20.5A8.5 8.5 0 103.5 12 8.5 8.5 0 0012 20.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-gray-700">No Gallery Items</h3>
                <p class="text-gray-500 text-sm">Please check back later for updates.</p>
            </div>
        </div>
        @endif

    </div>

    <!-- Lightbox Modal -->
    <div x-show="lightboxOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-sm p-4"
         style="display: none;">
         
        <!-- Close Button -->
        <button @click="closeLightbox()" class="absolute top-6 right-6 text-white/80 hover:text-white transition-colors z-50">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <!-- Content -->
        <div class="relative max-w-7xl w-full h-full flex items-center justify-center p-2" @click.outside="closeLightbox()">
            <template x-if="isVideo">
                <video x-bind:src="activeSrc" class="max-w-full max-h-full rounded-lg shadow-2xl object-contain" controls autoplay></video>
            </template>
            <template x-if="!isVideo">
                <img x-bind:src="activeSrc" class="max-w-full max-h-full rounded-lg shadow-2xl object-contain">
            </template>
        </div>
    </div>

</section>
<!-- Call to Action -->
<section class="bg-indigo-600 text-white py-16 text-center">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-4">Want to See More?</h2>
        <p class="text-lg mb-6 max-w-2xl mx-auto">Check out our projects and innovations in detail and discover how we deliver excellence.</p>
        <a href="{{ url('/contact') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
            Contact Us
        </a>
    </div>
</section>
@endsection