@extends('admin.layouts.app')
@section('title', 'Edit Gallery')

@section('content')
<div class="container mx-auto px-4 py-8">

<h1 class="text-2xl font-bold mb-6">Edit Gallery Item</h1>

<form method="POST"
      action="{{ route('admin.gallery.update', $gallery->id) }}"
      enctype="multipart/form-data"
      class="space-y-4">

    @csrf
    @method('PUT')

    <div>
        <label class="block font-medium mb-2">Current</label>

        @if($gallery->isVideo())
            <video controls class="w-64 rounded border">
                <source src="{{ asset('storage/'.$gallery->image) }}">
            </video>
        @else
            <img src="{{ asset('storage/'.$gallery->image) }}"
                 class="w-64 h-40 object-cover rounded border">
        @endif
    </div>

    <div>
        <label class="block font-medium">Replace File</label>
        <input type="file"
               name="image"
               accept="image/*,video/*"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div>
        <label class="block font-medium">Title</label>
        <input type="text"
               name="title"
               value="{{ $gallery->title }}"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div>
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border px-3 py-2 rounded">
            <option value="1" {{ $gallery->status ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$gallery->status ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>

</form>
</div>
@endsection
