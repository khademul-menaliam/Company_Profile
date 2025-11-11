@extends('admin.layouts.app')
@section('title', 'Edit projects | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit project</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Short Description</label>
            <textarea name="short_description" class="w-full border rounded p-2">{{ old('short_description', $project->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Current Image</label>
            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" class="w-32 h-32 object-cover rounded mb-2">
            @else
                <p class="text-gray-500 mb-2">No image uploaded.</p>
            @endif
            <input type="file" name="image" class="w-full">
        </div>
                {{-- Multiple Images Input Below --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold ">Add New Gallery Images</label>
            <input type="file" name="gallery[]" multiple accept="image/*"
                class="w-full ">
        </div>
<div class="overflow-x-auto whitespace-nowrap py-2 mb-2">
    <label class="block mb-1 font-semibold">Gallery Images (Select For Delete)</label>

    @if($project->gallery->count() > 0)
        @foreach($project->gallery as $img)
            <div class="relative inline-block mr-2">
                <img src="{{ asset('storage/' . $img->image) }}" class="h-24 rounded shadow">
                {{-- Checkbox to mark image for deletion --}}
                <label class="absolute top-0 right-0 bg-red-600 text-white px-1 py-0.5 rounded cursor-pointer text-xs">
                    <input type="checkbox" name="delete_gallery[]" value="{{ $img->id }}">
                    X
                </label>
            </div>
        @endforeach
    @else
        <p class="text-gray-500 inline-block">No images uploaded.</p>
    @endif
</div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update project</button>
        <a href="{{ route('admin.projects.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection
