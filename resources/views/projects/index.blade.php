@extends('layouts.app')
@section('title', 'Projects | AR Engineering')

@section('content')
<section class="py-0 bg-gray-50 ">
  <div class="container mx-auto px-4 mb-2">
    <div class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white mb-5 py-8 rounded-lg text-center overflow-hidden">
    <h1 class="text-4xl font-bold text-center mb-0">Our Projects</h1>
    </div>


    @if($projects->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($projects as $project)
          <div class="bg-white shadow rounded-lg overflow-hidden">
            @if($project->image)
              <img src="{{ asset('storage/'.$project->image) }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-6">
              <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
              <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 120) }}</p>
              <a href="{{ route('projects.show', $project->slug) }}" class="text-indigo-600 hover:underline font-semibold">View Details</a>
            </div>
          </div>
        @endforeach
      </div>
    @else
      {{-- No projects found --}}
    <div class="bg-white border border-gray-300 rounded-lg p-12 text-center shadow flex flex-col items-center justify-center">
    <!-- Box for icon -->
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
            <!-- Normal icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7M4 13h16v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7z" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-700">No Projects Available</h3>
        <p class="text-gray-500 max-w-xs">We currently have no projects. Please check back later.</p>
    </div>
    @endif

  </div>
</section>
@endsection
