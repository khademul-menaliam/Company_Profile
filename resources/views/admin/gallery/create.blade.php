@extends('admin.layouts.app')
@section('title', 'Add Gallery')

@section('content')
<div class="container mx-auto px-4 py-8">

<h1 class="text-2xl font-bold mb-6">Add Gallery</h1>

<form method="POST"
      action="{{ route('admin.gallery.store') }}"
      enctype="multipart/form-data"
      class="space-y-4">

    @csrf

    <div>
        <label class="block font-medium">Title (optional)</label>
        <input type="text" name="title"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div>
        <label class="block font-medium">
            Upload Images / Videos
        </label>
        <input type="file"
               name="files[]"
               multiple
               accept="image/*,video/*"
               class="w-full border px-3 py-2 rounded">
        <p class="text-sm text-gray-500 mt-1">Upload multiple files from your computer.</p>
    </div>

    <div>
        <label class="block font-medium text-gray-700">Or Add Vimeo URLs</label>
        <textarea name="vimeo_urls" rows="3" class="w-full border px-3 py-2 rounded" placeholder="https://player.vimeo.com/video/123456789&#10;Enter one URL per line for multiple videos."></textarea>
    </div>

    <div>
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border px-3 py-2 rounded">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Upload
    </button>

</form>
</div>
@endsection
