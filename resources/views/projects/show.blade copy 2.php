@extends('layouts.app')
@section('title', $project->title . ' | AR Engineering')

@section('content')
<section class="bg-gray-50">
  <div class="container mx-auto px-4 md:px-0">

    <!-- Hero / Project Title -->
    <div class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white rounded-lg py-12 px-6 mb-10 text-center overflow-hidden shadow-lg">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4">{{ $project->title }}</h1>
        @if($project->location)
        <p class="text-lg md:text-xl opacity-80">{{ $project->location }}</p>
        @endif
    </div>

    <!-- Client & Key Project Info -->
    <div class="flex flex-col md:flex-row gap-8 mb-12">
        <!-- Featured Image -->
        @if($project->image)
        <div class="md:w-2/3">
            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}"
                class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow-lg border border-gray-200">
        </div>
        @endif

        <!-- Project Details & Client -->
        <div class="md:w-1/3 flex flex-col gap-6">
            <!-- Client Info -->
            @if($project->client && $project->client->logo)
            <div class="flex items-center gap-4 bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('images/' . $project->client->logo) }}" alt="{{ $project->client->name }}"
                     class="w-16 h-16 object-contain rounded-full border border-gray-200">
                <span class="font-semibold text-lg">{{ $project->client->name }}</span>
            </div>
            @else
            <div class="flex items-center gap-4 bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <p class="text-gray-500">Client Details Not Found</p>
            </div>
            @endif

            <!-- Project Description -->
            <div class="bg-white p-4 rounded-lg shadow text-gray-700 leading-relaxed">
                {!! $project->description ?? 'Description will be updated soon.' !!}
            </div>

            <!-- Key Info -->
            <div class="bg-white p-4 rounded-lg shadow space-y-2">
                <p><strong>Type:</strong> {{ $project->type ?? 'N/A' }}</p>
                <p><strong>Timeline:</strong> {{ $project->timeline ?? 'N/A' }}</p>
                <p><strong>Location:</strong> {{ $project->location ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

        {{-- Project Overview Sections --}}
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-8 max-w-5xl">

            <!-- Challenge / Objectives -->
            <div class="mb-12 border rounded-xl p-8 shadow-sm hover:shadow-md transition">
                <h2 class="text-3xl font-semibold text-indigo-700 mb-4">Challenge / Objectives</h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! $project->objectives ?? 'Project objectives will be updated soon.' !!}
                </p>
            </div>

            <!-- Solution / Approach -->
            <div class="mb-12 border rounded-xl p-8 shadow-sm hover:shadow-md transition">
                <h2 class="text-3xl font-semibold text-indigo-700 mb-4">Solution / Approach</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {!! $project->solution ?? 'Solution details will be updated soon.' !!}
                </p>

                {{-- Optional diagrams or model screenshots --}}
                @if(isset($project->approach_images) && count($project->approach_images) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        @foreach($project->approach_images as $img)
                            <img src="{{ asset('storage/' . $img) }}" class="rounded-lg shadow-md object-cover h-48 w-full">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Technical Details -->
            <div class="mb-12 border rounded-xl p-8 shadow-sm hover:shadow-md transition">
                <h2 class="text-3xl font-semibold text-indigo-700 mb-4">Technical Details</h2>
                <ul class="list-disc pl-5 text-gray-700 space-y-2">
                    @if($project->technical_details)
                        {!! $project->technical_details !!}
                    @else
                        <li>Tools and technologies will be updated soon.</li>
                    @endif
                </ul>
            </div>

            <!-- Results / Outcome -->
            <div class="mb-12 border rounded-xl p-8 shadow-sm hover:shadow-md transition">
                <h2 class="text-3xl font-semibold text-indigo-700 mb-4">Results / Outcome</h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! $project->results ?? 'Project results will be added soon.' !!}
                </p>
            </div>

        </div>
    </section>

    {{-- Gallery will come here (your existing gallery section) --}}
        <!-- Project Gallery -->
    <h2 class="text-3xl font-semibold my-6 text-gray-800 text-center">Project Gallery</h2>
    @if($project->gallery->isNotEmpty())

        <div class="relative group">
            <!-- Gallery Flex -->
<div class="gallery-container flex overflow-x-auto snap-x snap-mandatory space-x-4 py-4 scroll-smooth">
    @foreach($project->gallery as $img)
        <div class="gallery-item flex-shrink-0
            w-[90%] sm:w-[80%] md:w-1/2 lg:w-1/3 xl:w-1/4
            snap-center">

            <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer group"
                onclick="openModal('{{ asset('storage/' . $img->image) }}')">

                <img src="{{ asset('storage/' . $img->image) }}"
                    alt="Project Image"
                    class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">

                <div class="absolute inset-0 bg-black/25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 10l4.553-4.553a1 1 0 011.414 1.414L16.414 12l4.553 4.553a1 1 0 01-1.414 1.414L15 14m-6 0l-4.553 4.553a1 1 0 01-1.414-1.414L7.586 12 3.033 7.447a1 1 0 011.414-1.414L9 10m0 0l6 6"></path>
                    </svg>
                </div>

            </div>
        </div>
    @endforeach
</div>


            <!-- Navigation Buttons -->
            <button id="prevBtn" class="absolute top-1/2 left-0 transform -translate-y-1/2 z-20 p-3 rounded-full bg-indigo-600 hover:bg-indigo-800 text-white shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="nextBtn" class="absolute top-1/2 right-0 transform -translate-y-1/2 z-20 p-3 rounded-full bg-indigo-600 hover:bg-indigo-800 text-white shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden z-50 p-4">
        <span id="closeModal" class="absolute top-4 right-4 text-white text-4xl cursor-pointer">&times;</span>
        <img id="modalImage" src="" alt="Full-size Image" class="max-w-full max-h-full rounded-lg shadow-lg">
    </div>
    @else
        <div class="flex items-center justify-center bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
            <p class="text-center text-gray-500 my-3">No gallery images uploaded.</p>
        </div>
    @endif


    <!-- Testimonial -->
    {{-- <h2 class="text-3xl font-semibold text-indigo-700 mb-4">Client Testimonial</h2> --}}


    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 md:px-0 max-w-4xl">
            <div class="border rounded-xl p-8 shadow-md bg-white">
                <h2 class="text-3xl font-semibold text-indigo-700 mb-4">Client Testimonial</h2>
                 @if($project->testimonial)

                    <div class="text-gray-700 italic text-lg leading-relaxed">
                        “{{ $project->testimonial }}”
                    </div>

                    @if($project->client)
                        <p class="mt-4 font-semibold text-gray-900">— {{ $project->client->name }}</p>
                    @endif
                @endif

            </div>
        </div>
    </section>





    <!-- Explore Other Projects -->
    <div class="max-w-4xl mx-auto text-center mt-16 mb-5">
        <h2 class="text-3xl font-semibold mb-4 text-gray-800">Explore Other Projects</h2>
        <a href="{{ route('pIndex') }}" class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded-lg shadow hover:bg-indigo-700 transition duration-300">
            View All Projects
        </a>
    </div>
  </div>

  <!-- Gallery Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const galleryContainer = document.querySelector('.gallery-container');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeModal = document.getElementById('closeModal');

        let scrollAmount = 0;

        prevBtn.addEventListener('click', () => {
            scrollAmount = Math.max(0, scrollAmount - galleryContainer.offsetWidth / 2);
            galleryContainer.style.transform = `translateX(-${scrollAmount}px)`;
        });

        nextBtn.addEventListener('click', () => {
            scrollAmount = Math.min(galleryContainer.scrollWidth - galleryContainer.offsetWidth, scrollAmount + galleryContainer.offsetWidth / 2);
            galleryContainer.style.transform = `translateX(-${scrollAmount}px)`;
        });

        window.openModal = function(imageSrc) {
            modal.style.display = 'flex';
            modalImage.src = imageSrc;
        };

        closeModal.addEventListener('click', () => modal.style.display = 'none');
        modal.addEventListener('click', e => { if(e.target === modal) modal.style.display = 'none'; });
    });
  </script>
</section>
@endsection
