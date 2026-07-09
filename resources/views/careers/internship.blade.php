@extends('layouts.app')

@section('content')
<section class="py-10 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

    <h2 class="text-3xl font-extrabold text-indigo-700 mb-6">
      Internship Opportunities
    </h2>

    <p class="text-gray-600 mb-10 max-w-xl mx-auto">
      Gain hands-on experience with real industrial projects guided by experienced professionals.
    </p>

    <div class="grid gap-8 justify-center
                grid-cols-1
                sm:grid-cols-2
                lg:grid-cols-[repeat(auto-fit,minmax(300px,350px))]">

      @forelse($internships as $intern)

        <div class="bg-indigo-50 rounded-xl p-8 shadow-md hover:shadow-lg transition-shadow text-center flex flex-col justify-between w-full">

          <div>
            <div class="mb-3">
              <h3 class="font-bold text-lg text-indigo-900 leading-tight">
                {{ $intern->title }}
              </h3>

              <span class="text-xs font-medium bg-indigo-200 text-indigo-800 px-2 py-1 rounded capitalize mt-2 inline-block">
                {{ $intern->duration }}
              </span>
            </div>

            <p class="text-sm text-indigo-600 mb-3 font-medium">
              <i class="fas fa-map-marker-alt mr-1"></i>
              {{ $intern->location ?? 'Remote' }}
            </p>

            <p class="text-gray-600 mb-6 text-sm leading-relaxed">
              {{ Str::limit(strip_tags($intern->description), 100) }}
            </p>
          </div>

          <div>
            <a href="{{ route('career.show', ['type' => 'internship', 'slug' => $intern->slug]) }}"
               class="text-indigo-600 font-bold hover:underline inline-flex items-center justify-center">
              Learn More <span class="ml-1">→</span>
            </a>
          </div>

        </div>

      @empty

        <div class="col-span-full text-center py-10">
          <p class="text-gray-500 italic">
            No internship opportunities are currently open. Please check back later!
          </p>
        </div>

      @endforelse

    </div>

  </div>
</section>
@endsection
