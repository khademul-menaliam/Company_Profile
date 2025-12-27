@extends('admin.layouts.app')
@section('title', 'Edit Project | Admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <h1 class="text-3xl font-bold mb-6">Edit Project</h1>

    {{-- Success --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-md space-y-6">
        @csrf
        @method('PUT')

        {{-- Basic Info --}}
        <div>
            <label class="font-semibold">Title *</label>
            <input type="text" name="title"
                   value="{{ old('title', $project->title) }}"
                   class="w-full border rounded-lg p-2" required>
        </div>

        <div>
            <label class="font-semibold">Slug</label>
            <input type="text" name="slug"
                   value="{{ old('slug', $project->slug) }}"
                   class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="font-semibold">Location</label>
            <input type="text" name="location"
                   value="{{ old('location', $project->location) }}"
                   class="w-full border rounded-lg p-2">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="font-semibold">Project Type</label>
                <input type="text" name="type"
                       value="{{ old('type', $project->type) }}"
                       class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="font-semibold">Timeline</label>
                <input type="text" name="timeline"
                       value="{{ old('timeline', $project->timeline) }}"
                       class="w-full border rounded-lg p-2">
            </div>
        </div>

        {{-- Rich Text Fields --}}
        <div>
            <label class="font-semibold">Project Description</label>
            <textarea name="description" class="summernote">
{!! old('description', $project->description) !!}
            </textarea>
        </div>

        <div>
            <label class="font-semibold">Challenge / Objectives</label>
            <textarea name="objectives" class="summernote">
{!! old('objectives', $project->objectives) !!}
            </textarea>
        </div>

        <div>
            <label class="font-semibold">Solution / Approach</label>
            <textarea name="solution" class="summernote">
{!! old('solution', $project->solution) !!}
            </textarea>
        </div>

        <div>
            <label class="font-semibold">Technical Details</label>
            <textarea name="technical_details" class="summernote">
{!! old('technical_details', $project->technical_details) !!}
            </textarea>
        </div>

        <div>
            <label class="font-semibold">Results / Outcome</label>
            <textarea name="results" class="summernote">
{!! old('results', $project->results) !!}
            </textarea>
        </div>

        {{-- Client --}}
        <div>
            <label class="font-semibold">Client</label>
            <select name="client_id" class="w-full border rounded-lg p-2">
                <option value="">Select Client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}"
                        {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="font-semibold">Client Testimonial</label>
            <textarea name="testimonial" class="summernote">
{!! old('testimonial', $project->testimonial) !!}
            </textarea>
        </div>

        {{-- Featured Image --}}
        <div>
            <label class="font-semibold">Featured Image</label>
            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}"
                     class="w-32 h-32 object-cover rounded mb-2">
            @endif
            <input type="file" name="image" class="w-full border rounded-lg p-2">
        </div>

        {{-- Add Gallery Images --}}
        <div>
            <label class="font-semibold">Add New Gallery Images</label>
            <input type="file" name="gallery[]" multiple accept="image/*"
                   class="w-full border rounded-lg p-2">
        </div>

        {{-- Existing Gallery (Delete) --}}
        <div>
            <label class="font-semibold">Gallery Images (Select to Delete)</label>

            <div class="flex gap-3 flex-wrap mt-2">
                @forelse($project->gallery as $img)
                    <div class="relative">
                        <img src="{{ asset('storage/'.$img->image) }}"
                             class="h-24 w-24 object-cover rounded shadow">

                        <label class="absolute top-0 right-0 bg-red-600 text-white text-xs px-1 rounded cursor-pointer">
                            <input type="checkbox" name="delete_gallery[]" value="{{ $img->id }}">
                            ✕
                        </label>
                    </div>
                @empty
                    <p class="text-gray-500">No gallery images uploaded.</p>
                @endforelse
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-4">
            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Update Project
            </button>

            <a href="{{ route('admin.projects.index') }}"
               class="text-gray-600 underline">
                Cancel
            </a>
        </div>
    </form>
</div>

{{-- Summernote --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
$(document).ready(function () {
    $('.summernote').summernote({
        height: 180,
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
