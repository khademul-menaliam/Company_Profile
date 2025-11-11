@extends('layouts.app')

@section('content')
  <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-6">Our Services</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($services as $service)
          <div class="bg-white p-6 rounded shadow">
            @if($service->image)
              <img src="{{ asset('storage/'.$service->image) }}" alt="" class="w-full h-40 object-cover rounded mb-4">
            @endif
            <h3 class="text-xl font-semibold">{{ $service->title }}</h3>
            <p class="text-gray-600 mt-2">{{ $service->short_description }}</p>
            <a href="{{ route('services.show', $service->slug) }}" class="mt-3 inline-block text-indigo-600">Read more</a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
