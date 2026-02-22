@extends('admin.layouts.app')

@section('title', 'Edit Site Setting')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Edit Site Setting</h2>

  <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Setting Key -->
    <div class="mb-4">
      <label class="block mb-1 font-semibold">Setting Key</label>
      <input type="text"
             name="setting_key"
             value="{{ old('setting_key', $setting->setting_key) }}"
             class="w-full border rounded px-3 py-2">
    </div>

    <!-- Setting Type -->
    <div class="mb-4">
      <label class="block mb-1 font-semibold">Setting Type</label>
      <select name="setting_type"
              class="w-full border rounded px-3 py-2">

        <option value="text" {{ $setting->setting_type == 'text' ? 'selected' : '' }}>Text</option>
        <option value="image" {{ $setting->setting_type == 'image' ? 'selected' : '' }}>Image</option>
        <option value="file" {{ $setting->setting_type == 'file' ? 'selected' : '' }}>File (PDF)</option>
        <option value="url" {{ $setting->setting_type == 'url' ? 'selected' : '' }}>URL</option>
        <option value="boolean" {{ $setting->setting_type == 'boolean' ? 'selected' : '' }}>Boolean</option>
      </select>
    </div>

    <!-- TEXT -->
    <div class="mb-4 hidden" id="text-value">
      <label class="block mb-1 font-semibold">Setting Value (Text)</label>
      <input type="text"
             name="setting_value"
             value="{{ old('setting_value', $setting->setting_value) }}"
             class="w-full border rounded px-3 py-2">
    </div>

    <!-- IMAGE -->
    <div class="mb-4 hidden" id="image-value">
      <label class="block mb-1 font-semibold">Upload Image</label>

      @if($setting->setting_value)
        <img src="{{ asset('storage/'.$setting->setting_value) }}"
             class="h-20 mb-2">
      @endif

      <input type="file"
             name="setting_value"
             class="w-full border rounded px-3 py-2">
    </div>

    <!-- FILE -->
    <div class="mb-4 hidden" id="file-value">
      <label class="block mb-1 font-semibold">Upload PDF File</label>

      @if($setting->setting_value)
        <a href="{{ asset($setting->setting_value) }}"
           target="_blank"
           class="text-indigo-600 underline block mb-2">
           View Current File
        </a>
      @endif

      <input type="file"
             name="setting_value"
             accept="application/pdf"
             class="w-full border rounded px-3 py-2">
    </div>

    <!-- URL -->
    <div class="mb-4 hidden" id="url-value">
      <label class="block mb-1 font-semibold">Setting Value (URL)</label>
      <input type="url"
             name="setting_value"
             value="{{ old('setting_value', $setting->setting_value) }}"
             class="w-full border rounded px-3 py-2">
    </div>

    <!-- BOOLEAN -->
    <div class="mb-4 hidden" id="boolean-value">
      <label class="block mb-1 font-semibold">Setting Value (Boolean)</label>
      <select name="setting_value"
              class="w-full border rounded px-3 py-2">
        <option value="1" {{ $setting->setting_value == 1 ? 'selected' : '' }}>True</option>
        <option value="0" {{ $setting->setting_value == 0 ? 'selected' : '' }}>False</option>
      </select>
    </div>

    <div class="flex justify-end">
      <a href="{{ route('admin.settings.index') }}"
         class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 mr-2">
         Cancel
      </a>
      <button type="submit"
              class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
              Update
      </button>
    </div>
  </form>
</div>

<script>
  const typeSelect = document.querySelector('select[name="setting_type"]');

  const sections = {
    text: document.querySelector('#text-value'),
    image: document.querySelector('#image-value'),
    file: document.querySelector('#file-value'),
    url: document.querySelector('#url-value'),
    boolean: document.querySelector('#boolean-value'),
  };

  function toggleFields(type) {

    Object.keys(sections).forEach(key => {
      const section = sections[key];
      const input = section.querySelector('input, select');

      section.classList.add('hidden');
      input.disabled = true;
    });

    const activeSection = sections[type];
    const activeInput = activeSection.querySelector('input, select');

    activeSection.classList.remove('hidden');
    activeInput.disabled = false;
  }

  typeSelect.addEventListener('change', function () {
    toggleFields(this.value);
  });

  toggleFields(typeSelect.value);
</script>

@endsection
