@extends('layouts.app')
@section('title', $project->title . ' | AR Engineering')

@section('content')
<section class="py-0 bg-gray-50">
  <div class="container mx-auto px-4 md:px-0">

    <!-- Project Title -->

    <div class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white mb-5 py-8 rounded-lg text-center overflow-hidden">
    {{-- <h1 class="text-4xl font-bold text-center mb-0">Our Projects</h1> --}}
        <h1 class="text-4xl font-bold mb-4 text-center text-indigo-700">{{ $project->title }}</h1>
    </div>
        <!-- Client Info & Featured Image -->
    <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mb-12">
        @if($project->image)
            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}"
                class="w-full md:w-2/3 max-h-[400px] object-cover rounded shadow-lg">
        @endif
<div class="md:w-1/3 flex flex-col gap-4">
    @if($project->client && $project->client->logo)
    <div class="flex items-center gap-2">
        <img src="{{ asset('images/' . $project->client->logo) }}" alt="{{ $project->client->name }}" class="w-16 h-16 object-contain rounded shadow">
        <span class="font-semibold text-lg">{{ $project->client->name }}</span>
    </div>
    @else
    <p class="text-gray-500">No client (Client Details Not Found)</p> <!-- Display this message when no client or logo -->
    @endif

    <div class="max-w-4xl mx-auto text-gray-700 leading-relaxed mb-12">
        {!! $project->description ?? 'No description available now. Project Details Update Soon.' !!}
    </div>
</div>

    </div>
        <div>
            <p><strong>Location:</strong> {{ $project->location ?? 'N/A ( Location Details Not Found, Update Soon. )' }}</p>
            <p><strong>Project Type:</strong> {{ $project->type ?? 'N/A ( Details Not Found, Update Soon. )' }}</p>
            <p><strong>Timeline:</strong> {{ $project->timeline ?? 'N/A ( Estimated Time Details Not Found, Update Soon. )' }}</p>
        </div>

    <!-- Project Description -->

    <!-- Gallery -->
    {{-- @if($project->gallery->count() > 1)
    <div class="max-w-5xl mx-auto mb-12">
      <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Project Gallery</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($project->images as $image)
          <img src="{{ asset('storage/'.$project->image) }}" alt="Project Image"
               class="w-full h-40 object-cover rounded shadow hover:scale-105 transform transition duration-300">
        @endforeach
      </div>
    </div>
    @endif --}}
    <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Project Gallery</h2>

@if($project->gallery->isNotEmpty())

    <!-- Image container with arrows -->
    <div class="relative">
        <!-- Left Arrow -->
        <button id="prevBtn" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-indigo-600 hover:bg-indigo-800 rounded-full p-2 z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>

        <!-- Right Arrow -->
        <button id="nextBtn" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-indigo-600 hover:bg-indigo-800 rounded-full p-2 z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <!-- Gallery Grid -->
        <div class="gallery-container flex overflow-x-hidden space-x-4 transition-transform duration-300 ease-in-out">
            @foreach($project->gallery as $img)
                <div class="gallery-item flex justify-center items-center w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
                    <img src="{{ asset('storage/' . $img->image) }}" alt="Project Image"
                        class="max-w-full max-h-64 object-contain rounded shadow-lg cursor-pointer transition-all duration-300 ease-in-out hover:scale-105"
                        onclick="openModal('{{ asset('storage/' . $img->image) }}')">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal for full-size image -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden z-50 pt-12">
        <span id="closeModal" class="absolute top-4 right-4 text-white text-3xl cursor-pointer">&times;</span>
        <img id="modalImage" src="" alt="Full-size Project Image" class="max-w-full max-h-full object-contain">
    </div>


    @else
        <p class="text-gray-500">No gallery images uploaded.</p>
    {{-- @endif --}}

    {{-- </div> --}}
@endif

    <!-- Related Projects -->
    <div class="max-w-4xl mx-auto text-center mb-2 mt-14">
      <h2 class="text-3xl font-semibold mb-4 text-gray-800">Explore Other Projects</h2>
      <a href="{{ route('pIndex') }}" class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded shadow hover:bg-indigo-700 transition duration-300">
        View All Projects
      </a>
    </div>

  </div>

  <script>

document.addEventListener('DOMContentLoaded', function () {
    const galleryContainer = document.querySelector('.gallery-container');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const closeModal = document.getElementById('closeModal');

    let scrollAmount = 0; // Keeps track of how much we've scrolled

    // Scroll the gallery left when the left button is clicked
    prevBtn.addEventListener('click', function () {
        if (scrollAmount > 0) {
            scrollAmount -= galleryContainer.offsetWidth / 2; // Scroll by half the width of the container
            galleryContainer.style.transform = `translateX(-${scrollAmount}px)`;
        }
    });

    // Scroll the gallery right when the right button is clicked
    nextBtn.addEventListener('click', function () {
        if (scrollAmount < galleryContainer.scrollWidth - galleryContainer.offsetWidth) {
            scrollAmount += galleryContainer.offsetWidth / 2; // Scroll by half the width of the container
            galleryContainer.style.transform = `translateX(-${scrollAmount}px)`;
        }
    });

    // Open the modal with the full-size image when an image is clicked
    window.openModal = function(imageSrc) {
        modal.style.display = 'flex';
        modalImage.src = imageSrc;
    };

    // Close the modal when the close button is clicked
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close the modal if the user clicks outside the image
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});


  </script>
</section>
@endsection
