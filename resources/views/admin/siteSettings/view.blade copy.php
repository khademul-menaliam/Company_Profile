@extends('admin.layouts.app')

@section('title', 'View Site Setting')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">View Site Setting</h2>

  <div class="mb-4">
    <label class="block mb-1 font-semibold">Setting Key</label>
    <p>{{ $setting->setting_key }}</p>
  </div>

  <div class="mb-4">
    <label class="block mb-1 font-semibold">Setting Type</label>
    <p>{{ ucfirst($setting->setting_type) }}</p>
  </div>

  <div class="mb-4">
    <label class="block mb-1 font-semibold">Setting Value</label>
    @if($setting->setting_type == 'image' && $setting->setting_value)
      <img src="{{ asset('storage/'.$setting->setting_value) }}" class="h-20" alt="Current Image">
    @else
      <p>{{ $setting->setting_value ?? 'N/A' }}</p>
    @endif
  </div>

  <div class="flex justify-end">
    <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Back to List</a>
  </div>
</div>
@endsection
