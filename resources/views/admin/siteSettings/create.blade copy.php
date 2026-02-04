@extends('admin.layouts.app')

@section('title', 'Add Site Setting')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Add Site Setting</h2>

  <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Setting Key -->
    <div class="mb-4">
      <label class="block mb-1 font-semibold">Setting Key</label>
      <input type="text" name="setting_key" class="w-full border rounded px-3 py-2" required placeholder="e.g., site_name">
    </div>

    <!-- Setting Type (Text, URL, Image, Boolean) -->
    <div class="mb-4">
      <label class="block mb-1 font-semibold">Setting Type</label>
      <select name="setting_type" class="w-full border rounded px-3 py-2" required>
        <option value="text">Text</option>
        <option value="image">Image</option>
        <option value="url">URL</option>
        <option value="boolean">Boolean</option>
      </select>
    </div>

    <!-- Setting Value -->
    <div class="mb-4" id="text-value">
      <label class="block mb-1 font-semibold">Setting Value (Text)</label>
      <input type="text" name="setting_value" class="w-full border rounded px-3 py-2" required placeholder="e.g., My Awesome Website">
    </div>

    <!-- Image Upload Section (shown only if setting type is 'image') -->
    <div class="mb-4 hidden" id="image-value">
      <label class="block mb-1 font-semibold">Upload Image</label>
      <input type="file" name="setting_value" class="w-full border rounded px-3 py-2">
    </div>

    <!-- URL Section (shown only if setting type is 'url') -->
    <div class="mb-4 hidden" id="url-value">
      <label class="block mb-1 font-semibold">Setting Value (URL)</label>
      <input type="url" name="setting_value" class="w-full border rounded px-3 py-2" placeholder="e.g., https://example.com">
    </div>

    <!-- Boolean Section (shown only if setting type is 'boolean') -->
    <div class="mb-4 hidden" id="boolean-value">
      <label class="block mb-1 font-semibold">Setting Value (Boolean)</label>
      <select name="setting_value" class="w-full border rounded px-3 py-2">
        <option value="1">True</option>
        <option value="0">False</option>
      </select>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end">
      <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 mr-2">Cancel</a>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
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
