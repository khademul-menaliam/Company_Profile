@extends('admin.layouts.app')

@section('title', 'Add Site Setting')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Add Site Setting</h2>

  <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
      <input type="text" name="setting_key" class="w-full border rounded px-3 py-2" placeholder="e.g., site_name">
    </div>

    <!-- Setting Type (Text, URL, Image, Boolean) -->
    <div class="mb-4">
      <label class="block mb-1 font-semibold">Setting Type</label>
      <select name="setting_type" class="w-full border rounded px-3 py-2">

        <option value="text">Text</option>
        <option value="image">Image</option>
        <option value="file">File (PDF)</option>
        <option value="url">URL</option>
        <option value="boolean">Boolean</option>

      </select>
    </div>

    <!-- Setting Value -->
    <div class="mb-4" id="text-value">
      <label class="block mb-1 font-semibold">Setting Value (Text)</label>
      <input type="text" name="setting_value" class="w-full border rounded px-3 py-2"  placeholder="e.g., My Awesome Website">
          @error('setting_value')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
    </div>



    <!-- Image Upload Section (shown only if setting type is 'image') -->
    <div class="mb-4 hidden" id="image-value">
      <label class="block mb-1 font-semibold">Upload Image</label>
      <input type="file" name="setting_value" class="w-full border rounded px-3 py-2">
          @error('setting_value')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
    </div>


    <!-- File Upload Section (PDF) -->
    <div class="mb-4 hidden" id="file-value">
      <label class="block mb-1 font-semibold">Upload PDF File</label>
      <input type="file"
            name="setting_value"
            accept="application/pdf"
            class="w-full border rounded px-3 py-2">
      <p class="text-sm text-gray-500 mt-1">
        Upload Company Profile (PDF only)
      </p>
          @error('setting_value')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
    </div>




    <!-- URL Section (shown only if setting type is 'url') -->
    <div class="mb-4 hidden" id="url-value">
      <label class="block mb-1 font-semibold">Setting Value (URL)</label>
      <input type="url" name="setting_value" class="w-full border rounded px-3 py-2" placeholder="e.g., https://example.com">
          @error('setting_value')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
    </div>



    <!-- Boolean Section (shown only if setting type is 'boolean') -->
    <div class="mb-4 hidden" id="boolean-value">
      <label class="block mb-1 font-semibold">Setting Value (Boolean)</label>
      <select name="setting_value" class="w-full border rounded px-3 py-2">
        <option value="1">True</option>
        <option value="0">False</option>
      </select>
          @error('setting_value')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
    </div>



    <!-- Action Buttons -->
    <div class="flex justify-end">
      <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 mr-2">Cancel</a>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
    </div>
  </form>
</div>


{{-- <script>
  const typeSelect = document.querySelector('select[name="setting_type"]');

  function toggleFields(type) {
    document.getElementById('text-value').classList.add('hidden');
    document.getElementById('image-value').classList.add('hidden');
    document.getElementById('file-value').classList.add('hidden');
    document.getElementById('url-value').classList.add('hidden');
    document.getElementById('boolean-value').classList.add('hidden');

    if (type === 'text') {
      document.getElementById('text-value').classList.remove('hidden');
    } else if (type === 'image') {
      document.getElementById('image-value').classList.remove('hidden');
    } else if (type === 'file') {
      document.getElementById('file-value').classList.remove('hidden');
    } else if (type === 'url') {
      document.getElementById('url-value').classList.remove('hidden');
    } else if (type === 'boolean') {
      document.getElementById('boolean-value').classList.remove('hidden');
    }
  }

  typeSelect.addEventListener('change', function () {
    toggleFields(this.value);
  });

  // Trigger on page load
  toggleFields(typeSelect.value);
</script> --}}


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

