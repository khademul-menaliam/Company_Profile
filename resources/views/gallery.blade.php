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
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">

        @if($galleryItems->count() > 0)
        <div class="relative">
            <!-- Left Arrow -->
            <button class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-indigo-600 hover:bg-indigo-800 rounded-full p-2 z-10" id="scrollLeft">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Right Arrow -->
            <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-indigo-600 hover:bg-indigo-800 rounded-full p-2 z-10" id="scrollRight">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Gallery Cards Container -->
            <div class="flex overflow-x-hidden scroll-smooth gap-4 py-4 px-4 justify-center" id="galleryContainer">
                @foreach($galleryItems as $item)
                @if($item->isVideo())
                    <video controls class="rounded">
                        <source src="{{ asset('storage/'.$item->image) }}">
                    </video>
                @else
                    <img src="{{ asset('storage/'.$item->image) }}" class="rounded">
                @endif
            @endforeach
            
            </div>
        </div>
        @else
        <div class="flex justify-center">
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

<script>
document.getElementById('scrollLeft').addEventListener('click', function() {
    const container = document.getElementById('galleryContainer');
    const itemWidth = container.scrollWidth / container.children.length;
    const currentScroll = container.scrollLeft;

    if(currentScroll === 0){
        container.scrollLeft = container.scrollWidth - itemWidth;
    } else {
        container.scrollBy({ left: -itemWidth, behavior: 'smooth' });
    }
});

document.getElementById('scrollRight').addEventListener('click', function() {
    const container = document.getElementById('galleryContainer');
    const itemWidth = container.scrollWidth / container.children.length;
    const currentScroll = container.scrollLeft;

    if(currentScroll + container.offsetWidth >= container.scrollWidth){
        container.scrollLeft = 0;
    } else {
        container.scrollBy({ left: itemWidth, behavior: 'smooth' });
    }
});
</script>
@endsection
