@extends('admin.layouts.app')

@section('title', 'View Site Setting')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 max-w-2xl mx-auto">

  {{-- Header --}}
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">
        View Site Setting
    </h2>

    <a href="{{ route('admin.settings.edit', $setting->id) }}"
       class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        Edit Setting
    </a>
  </div>

  {{-- Setting Key --}}
  <div class="mb-6">
    <label class="block text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">
        Setting Key
    </label>
    <div class="bg-gray-50 border rounded-lg px-4 py-3 text-gray-800 font-medium">
        {{ $setting->setting_key }}
    </div>
  </div>

  {{-- Setting Type --}}
  <div class="mb-6">
    <label class="block text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">
        Setting Type
    </label>

    @php
        $colors = [
            'text' => 'bg-gray-100 text-gray-700',
            'image' => 'bg-blue-100 text-blue-700',
            'url' => 'bg-indigo-100 text-indigo-700',
            'boolean' => 'bg-purple-100 text-purple-700',
            'file' => 'bg-yellow-100 text-yellow-700',
        ];
    @endphp

    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full {{ $colors[$setting->setting_type] ?? 'bg-gray-100 text-gray-700' }}">
        {{ ucfirst($setting->setting_type) }}
    </span>
  </div>

  {{-- Setting Value --}}
  <div class="mb-8">
    <label class="block text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">
        Setting Value
    </label>

    @if($setting->setting_type == 'image' && $setting->setting_value)

        <div class="bg-gray-50 p-4 rounded-lg border inline-block">
            <img src="{{ asset('storage/'.$setting->setting_value) }}"
                 class="h-32 rounded shadow-sm"
                 alt="Current Image">
        </div>

    @elseif($setting->setting_type == 'file' && $setting->setting_value)

        <a href="{{ asset($setting->setting_value) }}"
           target="_blank"
           class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition font-medium">
            View PDF File
        </a>

    @elseif($setting->setting_type == 'boolean')

        @if($setting->setting_value)
            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-700">
                True
            </span>
        @else
            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-700">
                False
            </span>
        @endif

    @elseif($setting->setting_type == 'url' && $setting->setting_value)

        <a href="{{ $setting->setting_value }}"
           target="_blank"
           class="text-indigo-600 hover:underline break-all">
            {{ $setting->setting_value }}
        </a>

    @else

        <div class="bg-gray-50 border rounded-lg px-4 py-3 text-gray-800">
            {{ $setting->setting_value ?? 'N/A' }}
        </div>

    @endif
  </div>

  {{-- Footer Buttons --}}
  <div class="flex justify-between items-center">

    <a href="{{ route('admin.settings.index') }}"
       class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
        ← Back to List
    </a>

    <a href="{{ route('admin.settings.edit', $setting->id) }}"
       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        Edit
    </a>

  </div>

</div>
@endsection
