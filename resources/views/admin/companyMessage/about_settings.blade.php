@extends('admin.layouts.app')
@section('title', 'About Page Details')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">About Page Details</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.about-page-details.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- About Us Section --}}
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">About Us Section</h2>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" name="about_title" value="{{ old('about_title', $aboutUs->title ?? '') }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium mb-1">Content</label>
                    <textarea name="about_content" class="w-full border p-2 rounded rich-editor">{{ old('about_content', $aboutUs->content ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1">Image</label>
                    <input type="file" name="about_image" class="w-full border p-2 rounded" accept="image/*">
                    @if(isset($aboutUs) && $aboutUs->image)
                        <img src="{{ asset('storage/' . $aboutUs->image) }}" class="mt-2 h-32 object-cover rounded">
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Core Values Section</h2>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" name="core_values_title" value="{{ old('core_values_title', $coreValues->title ?? '') }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium mb-1">Content (List & Details)</label>
                    <textarea name="core_values_content" class="w-full border p-2 rounded rich-editor">{{ old('core_values_content', $coreValues->content ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Mission Section --}}
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Mission Section</h2>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" name="mission_title" value="{{ old('mission_title', $mission->title ?? '') }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium mb-1">Content</label>
                    <textarea name="mission_content" class="w-full border p-2 rounded rich-editor">{{ old('mission_content', $mission->content ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Vision Section --}}
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Vision Section</h2>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" name="vision_title" value="{{ old('vision_title', $vision->title ?? '') }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium mb-1">Content</label>
                    <textarea name="vision_content" class="w-full border p-2 rounded rich-editor">{{ old('vision_content', $vision->content ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Quality Policy Section --}}
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Quality Policy Section</h2>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" name="quality_policy_title" value="{{ old('quality_policy_title', $qualityPolicy->title ?? '') }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium mb-1">Content</label>
                    <textarea name="quality_policy_content" class="w-full border p-2 rounded rich-editor">{{ old('quality_policy_content', $qualityPolicy->content ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Philosophy Section --}}
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">Philosophy Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Title</label>
                    <input type="text" name="philosophy_title" value="{{ old('philosophy_title', $philosophy->title ?? '') }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium mb-1">Subtitle</label>
                    <input type="text" name="philosophy_subtitle" value="{{ old('philosophy_subtitle', $philosophy->subtitle ?? '') }}" class="w-full border p-2 rounded">
                </div>
                <div class="md:col-span-2">
                    <label class="block font-medium mb-1">Content</label>
                    <textarea name="philosophy_content" class="w-full border p-2 rounded rich-editor">{{ old('philosophy_content', $philosophy->content ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded shadow hover:bg-indigo-700">
                Save All Changes
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.rich-editor').forEach(editorElement => {
            ClassicEditor
                .create(editorElement)
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>
@endpush
