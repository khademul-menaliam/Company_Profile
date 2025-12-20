@extends('admin.layouts.app')

@section('title', 'Edit Site Setting')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Edit Site Setting</h2>

  <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Setting Key -->
    <div class="mb-4">
      <label class="block mb-1 font-semibold">Setting Key</label>
      <input type="text" name="setting_key" value="{{ old('setting_key', $setting->setting_key) }}" class="w-full border rounded px-3 py-2" required placeholder="e.g., site_name" readonly>
    </div>

    <!-- Setting Type -->
    <div class="mb-4">
      <label class="block mb-1 font-semibold">Setting Type</label>
      <select name="setting_type" class="w-full border rounded px-3 py-2" required>
        <option value="text" {{ $setting->setting_type == 'text' ? 'selected' : '' }}>Text</option>
        <option value="image" {{ $setting->setting_type == 'image' ? 'selected' : '' }}>Image</option>
        <option value="url" {{ $setting->setting_type == 'url' ? 'selected' : '' }}>URL</option>
        <option value="boolean" {{ $setting->setting_type == 'boolean' ? 'selected' : '' }}>Boolean</option>
      </select>
    </div>

    <!-- Setting Value (Text) -->
    <div class="mb-4" id="text-value" @if($setting->setting_type != 'text') class="hidden" @endif>
      <label class="block mb-1 font-semibold">Setting Value (Text)</label>
      <input type="text" name="setting_value" value="{{ old('setting_value', $setting->setting_value) }}" class="w-full border rounded px-3 py-2" required placeholder="e.g., My Awesome Website">
    </div>

    <!-- Image Upload Section -->
    <div class="mb-4" id="image-value" @if($setting->setting_type != 'image') class="hidden" @endif>
      <label class="block mb-1 font-semibold">Upload Image</label>
      @if($setting->setting_value)
        <img src="{{ asset('storage/'.$setting->setting_value) }}" class="h-20 mb-2" alt="Current Logo">
      @endif
      <input type="file" name="setting_value" class="w-full border rounded px-3 py-2">
    </div>

    <!-- URL Section -->
    <div class="mb-4" id="url-value" @if($setting->setting_type != 'url') class="hidden" @endif>
      <label class="block mb-1 font-semibold">Setting Value (URL)</label>
      <input type="url" name="setting_value" value="{{ old('setting_value', $setting->setting_value) }}" class="w-full border rounded px-3 py-2" placeholder="e.g., https://example.com">
    </div>

    <!-- Boolean Section -->
    <div class="mb-4" id="boolean-value" @if($setting->setting_type != 'boolean') class="hidden" @endif>
      <label class="block mb-1 font-semibold">Setting Value (Boolean)</label>
      <select name="setting_value" class="w-full border rounded px-3 py-2">
        <option value="1" {{ $setting->setting_value == 1 ? 'selected' : '' }}>True</option>
        <option value="0" {{ $setting->setting_value == 0 ? 'selected' : '' }}>False</option>
      </select>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end">
      <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 mr-2">Cancel</a>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save Changes</button>
    </div>
  </form>
</div>

<script>
  // Dynamically show/hide fields based on the selected setting type
  document.querySelector('select[name="setting_type"]').addEventListener('change', function() {
    const type = this.value;
    document.getElementById('text-value').classList.add('hidden');
    document.getElementById('image-value').classList.add('hidden');
    document.getElementById('url-value').classList.add('hidden');
    document.getElementById('boolean-value').classList.add('hidden');

    if (type === 'text') {
      document.getElementById('text-value').classList.remove('hidden');
    } else if (type === 'image') {
      document.getElementById('image-value').classList.remove('hidden');
    } else if (type === 'url') {
      document.getElementById('url-value').classList.remove('hidden');
    } else if (type === 'boolean') {
      document.getElementById('boolean-value').classList.remove('hidden');
    }
  });

  // Trigger change event to handle default visibility on load
  document.querySelector('select[name="setting_type"]').dispatchEvent(new Event('change'));
</script>

@endsection
