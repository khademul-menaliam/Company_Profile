@extends('admin.layouts.app')
@section('title', 'Add projects | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Add New Service</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
          class="overflow-x-auto bg-white p-6 rounded-lg shadow-md space-y-5">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                   placeholder="Enter service title" required>
        </div>

        {{-- Slug --}}
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Slug (optional)</label>
            <input type="text" name="slug" value="{{ old('slug') }}"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                   placeholder="Enter custom slug or leave blank to auto-generate">
        </div>

        {{-- Short Description --}}
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Short Description</label>
            <textarea name="short_description" rows="3"
                      class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                      placeholder="Enter a short summary of the service">{{ old('short_description') }}</textarea>
        </div>

        {{-- Full Content / Description --}}
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Full Description</label>
            <textarea name="content" rows="5"
                      class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                      placeholder="Enter full details about the service">{{ old('content') }}</textarea>
        </div>

        {{-- Image --}}
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Image (Max 1)</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
            <p class="text-sm text-gray-500 mt-1">Max file size: 2MB (JPG, PNG, WEBP)</p>
        </div>
        {{-- Gallery Image --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Gallery Images (Min 2)</label>
                {{-- Multiple Images --}}
              <input type="file" name="gallery[]" multiple accept="image/*" class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
              <p class="text-sm text-gray-500 mt-1">Max file size: 2MB (JPG, PNG, WEBP)</p>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between items-center pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                Save Project
            </button>
            <a href="{{ route('admin.projects.index') }}"
               class="text-gray-600 hover:text-gray-800 underline transition">Cancel</a>
        </div>
    </form>
</div>

@endsection
