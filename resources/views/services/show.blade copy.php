@extends('layouts.app')
@section('title', $service->title . ' | AR Engineering')

@section('content')
<section class="py-0 bg-gray-50">
  <div class="container mx-auto px-4 md:px-0">

    <!-- Main Service Title -->
    <h1 class="text-4xl font-bold mb-6 text-center text-indigo-700">{{ $service->title }}</h1>

    <!-- Main Service Hero Image -->
    @if($service->image)
      <div class="flex justify-center mb-8">
        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full max-h-[400px] object-cover rounded shadow-lg">
      </div>
    @endif

    <!-- Main Service Description -->
    <div class="max-w-3xl mx-auto text-gray-700 leading-relaxed mb-12">
      {!! $service->content !!}
    </div>

    <!-- Sub-Services -->
    @if($service->children->count() > 0)
      <div class="max-w-5xl mx-auto mb-12">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Our Sub-Services</h2>

        @foreach($service->children as $sub)
          <div class="bg-white p-6 mb-8 rounded-lg shadow hover:shadow-lg transition-all duration-300">

            <!-- Sub-Service Image -->
            @if($sub->image)
              <div class="flex justify-center mb-4">
                <img src="{{ asset($sub->image) }}" alt="{{ $sub->title }}" class="w-full max-h-[300px] object-cover rounded shadow">
              </div>
            @endif

            <!-- Sub-Service Title -->
            <h3 class="text-2xl font-bold mb-3 text-indigo-600">{{ $sub->title }}</h3>

            <!-- Sub-Service Description -->
            <div class="text-gray-700 leading-relaxed mb-4">
              {!! $sub->content !!}
            </div>

            <!-- Sub-Service Features -->
            @if(!empty($sub->features))
            <div class="mb-4">
              <h4 class="font-semibold text-lg text-gray-800 mb-2">Features:</h4>
              <ul class="list-disc pl-5 space-y-1 text-gray-600">
                @foreach($sub->features as $feature)
                  <li><strong>{{ $feature['title'] }}:</strong> {{ $feature['description'] }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <!-- Sub-Service Benefits -->
            @if(!empty($sub->benefits))
            <div class="bg-indigo-50 p-4 rounded mb-4">
              <h4 class="font-semibold text-lg text-gray-800 mb-2">Benefits:</h4>
              <ul class="list-disc pl-5 text-gray-700 space-y-1">
                @foreach($sub->benefits as $benefit)
                  <li>{{ $benefit }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <!-- Sub-Service Gallery -->
            @if(!empty($sub->gallery))
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
              @foreach($sub->gallery as $image)
                <img src="{{ asset($image) }}" alt="{{ $sub->title }}" class="w-full h-40 object-cover rounded shadow hover:scale-105 transform transition duration-300">
              @endforeach
            </div>
            @endif

          </div>
        @endforeach
      </div>
    @endif

    <!-- Call to Action -->
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-semibold mb-4 text-gray-800">Explore Other Services</h2>
      <p class="mb-6 text-gray-600">Check out our other services that might interest you.</p>
      <a href="{{ route('sIndex') }}" class="inline-block bg-indigo-600 text-white font-semibold px-8 py-3 rounded shadow hover:bg-indigo-700 transition duration-300">View All Services</a>
    </div>

  </div>
</section>
@endsection
