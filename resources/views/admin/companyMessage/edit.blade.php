@extends('admin.layouts.app')
@section('title', 'Edit Company Section')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-2xl font-bold mb-6">Edit Company Section</h1>

    <form action="{{ route('admin.company-sections.update', $companySection->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white px-6 pt-1 pb-3 rounded shadow space-y-6">
        @csrf
        @method('PUT')

        {{-- SECTION (always message) --}}
        <input type="hidden" name="section" value="message">

        {{-- Title --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Title</label>
            <input name="title"
                   value="{{ old('title', $companySection->title) }}"
                   class="w-full border p-2 rounded">
        </div>

        {{-- Full Name --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Full Name</label>
            <input name="subtitle"
                   value="{{ old('subtitle', $companySection->subtitle) }}"
                   class="w-full border p-2 rounded">
        </div>

        {{-- Type --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Select Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="">Select Type</option>
                <option value="ceo" {{ old('type', $companySection->type) == 'ceo' ? 'selected' : '' }}>CEO Message</option>
                <option value="advisor" {{ old('type', $companySection->type) == 'advisor' ? 'selected' : '' }}>Advisor Message</option>
                <option value="history" {{ old('type', $companySection->type) == 'history' ? 'selected' : '' }}>Company History</option>
                <option value="about" {{ old('type', $companySection->type) == 'about' ? 'selected' : '' }}>About Us</option>
                <option value="philosophy" {{ old('type', $companySection->type) == 'philosophy' ? 'selected' : '' }}>Our Philosophy</option>
                <option value="strengths" {{ old('type', $companySection->type) == 'strengths' ? 'selected' : '' }}>Our Strengths</option>
            </select>
        </div>

        {{-- Full Message --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Full Message</label>
            <textarea name="content" class="summernote w-full">
                {{ old('content', $companySection->content) }}
            </textarea>
        </div>

        {{-- Current Image --}}
        @if($companySection->image)
            <div class="w-full">
                <label class="block font-medium mb-1">Current Image</label>
                <img src="{{ asset('storage/'.$companySection->image) }}"
                     class="w-32 h-auto rounded border">
            </div>
        @endif

        {{-- Change Image --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Change Image</label>
            <input type="file"
                   name="image"
                   class="w-full border p-2 rounded">
        </div>

        {{-- Status --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Status</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="1" {{ old('status', $companySection->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $companySection->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        {{-- Submit --}}
        <div class="pt-2">
            <button class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Update
            </button>

            <a href="{{ route('admin.company-sections.index') }}"
               class="ml-4 text-gray-600 underline">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
