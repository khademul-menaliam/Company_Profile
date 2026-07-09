@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-2 text-center">Current Job Openings</h2>
    <p class="text-center text-gray-600 mb-12">Join our team and build the future with us.</p>

    {{-- Flexbox container for perfect centering --}}
    <div class="flex flex-wrap justify-center gap-8 max-w-7xl mx-auto">
      @forelse($jobs as $job)
        {{-- Card: Blue-ish background with a left border accent --}}
        <div class="bg-indigo-50 border-l-4 border-indigo-500 rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between w-full md:max-w-[420px]">

          <div>
            <div class="flex justify-between items-start mb-4">
              <h3 class="font-bold text-xl text-indigo-900 leading-tight">{{ $job->title }}</h3>
              <span class="text-xs font-bold bg-indigo-600 text-white px-3 py-1 rounded-full uppercase tracking-wider whitespace-nowrap ml-2">
                  {{ str_replace('-', ' ', $job->type) }}
              </span>
            </div>

            <div class="flex flex-col gap-2 mb-4">
                <p class="text-sm text-indigo-700 font-medium italic flex items-center">
                  <i class="fas fa-map-marker-alt mr-2"></i> {{ $job->location ?? 'Head Office' }}
                </p>
                @if($job->deadline)
                <p class="text-xs text-gray-500 flex items-center">
                    <i class="fas fa-calendar-day mr-2"></i> Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}
                </p>
                @endif
            </div>

            <p class="text-gray-700 mb-6 leading-relaxed">
              {{ Str::limit(strip_tags($job->description), 110) }}
            </p>
          </div>

          <div class="mt-auto pt-4 border-t border-indigo-100">
            <a href="{{ route('career.show', ['type' => 'job', 'slug' => $job->slug]) }}"
               class="inline-flex items-center text-indigo-700 font-bold hover:text-indigo-900 transition-colors group">
                View Details
                <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
            </a>
          </div>
        </div>
      @empty
        <div class="w-full text-center py-16">
            <div class="text-indigo-200 text-6xl mb-4">
                <i class="fas fa-briefcase"></i>
            </div>
            <p class="text-gray-500 text-xl font-medium">No job openings available at the moment.</p>
            <p class="text-gray-400">Check back soon or follow our social media for updates!</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
