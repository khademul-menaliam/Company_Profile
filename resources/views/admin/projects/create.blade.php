@extends('admin.layouts.app')
@section('title', 'Add Project | Admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <h1 class="text-3xl font-bold mb-6">Add New Project</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-md space-y-6">
        @csrf

        {{-- Basic Info --}}
        <div>
            <label class="font-semibold">Title *</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border rounded-lg p-2" required>
        </div>

        <div>
            <label class="font-semibold">Slug (optional)</label>
            <input type="text" name="slug" value="{{ old('slug') }}"
                   class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="font-semibold">Location</label>
            <input type="text" name="location" value="{{ old('location') }}"
                   class="w-full border rounded-lg p-2">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="font-semibold">Project Type</label>
                <input type="text" name="type" value="{{ old('type') }}"
                       class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="font-semibold">Timeline</label>
                <input type="text" name="timeline" value="{{ old('timeline') }}"
                       class="w-full border rounded-lg p-2">
            </div>
        </div>

        {{-- Description --}}
        <div>
            <label class="font-semibold">Project Description</label>
            <textarea name="description" class="summernote">
                {{ old('description') }}
            </textarea>
        </div>

        {{-- Objectives --}}
        <div>
            <label class="font-semibold">Challenge / Objectives</label>
            <textarea name="objectives" class="summernote">
                {{ old('objectives') }}
            </textarea>
        </div>

        {{-- Solution --}}
        <div>
            <label class="font-semibold">Solution / Approach</label>
            <textarea name="solution" class="summernote">
                {{ old('solution') }}
            </textarea>
        </div>

        {{-- Technical Details --}}
        <div>
            <label class="font-semibold">Technical Details</label>
            <textarea name="technical_details" class="summernote">
                {{ old('technical_details') }}
            </textarea>
        </div>

        {{-- Results --}}
        <div>
            <label class="font-semibold">Results / Outcome</label>
            <textarea name="results" class="summernote">
                {{ old('results') }}
            </textarea>
        </div>

        {{-- Client --}}
        <div>
            <label class="font-semibold">Client</label>
            <select name="client_id" class="w-full border rounded-lg p-2">
                <option value="">Select Client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}"
                        {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Testimonial --}}
        <div>
            <label class="font-semibold">Client Testimonial</label>
            <textarea name="testimonial" class="summernote">
                {{ old('testimonial') }}
            </textarea>
        </div>

        {{-- Featured Image --}}
        <div>
            <label class="font-semibold">Featured Image</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full border rounded-lg p-2">
        </div>

        {{-- Gallery Images --}}
        <div>
            <label class="font-semibold">Gallery Images</label>
            <input type="file" name="gallery[]" multiple accept="image/*"
                   class="w-full border rounded-lg p-2">
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-4">
            <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                Save Project
            </button>

            <a href="{{ route('admin.projects.index') }}"
               class="text-gray-600 underline">
                Cancel
            </a>
        </div>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
$(document).ready(function () {
    $('.summernote').summernote({
        height: 180,
        placeholder: 'Write here...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
});
</script>
@endsection
