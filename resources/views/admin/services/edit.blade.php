@extends('admin.layouts.app')
@section('title', 'Edit Service | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Service</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" class="w-full border rounded p-2" required>
        </div>

        {{-- Parent Service Selection --}}
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Select Parent Service</label>
            <select name="parent_id"
                    class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                <option value="">— Main Service —</option>
                @foreach($parentServices as $parent)
                    <option value="{{ $parent->id }}"
                        {{ (old('parent_id', $service->parent_id) == $parent->id) ? 'selected' : '' }}>
                        {{ $parent->title }}
                    </option>
                @endforeach
            </select>
        </div>


        {{-- Short Description --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Short Description</label>
            <textarea name="short_description" class="w-full border rounded p-2">{{ old('short_description', $service->short_description) }}</textarea>
        </div>

        {{-- Full Content / Description --}}
        {{-- <div>
            <label class="block mb-1 font-semibold text-gray-700">Full Description</label>
            <textarea name="content" id="editor" rows="5"
                      class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                      placeholder="Enter full details about the service">{{ old('content',$service->content) }}</textarea>
        </div> --}}

        {{-- Full Content / Description --}}
<div>
    <label class="block mb-1 font-semibold text-gray-700">Full Description</label>

    <!-- Quill editor will initialize here -->
    <div id="editor" class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 ql-container ql-snow"></div>

    <!-- Hidden textarea for form submission -->
    <textarea name="content" id="content" style="display: none;">{{ old('content', $service->content) }}</textarea>
</div>

        {{-- Image --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Current Image</label>
            @if($service->image)
                <img src="{{ asset($service->image) }}" class="w-32 h-32 object-cover rounded mb-2">
            @else
                <p class="text-gray-500 mb-2">No image uploaded.</p>
            @endif
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Service</button>
        <a href="{{ route('admin.services.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>

        <!-- Initialize CKEditor 5 -->


<!-- Initialize Quill -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill editor
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Enter full details about the service...',
            modules: {
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'image'],
                    [{ 'align': [] }],
                    ['blockquote', 'code-block']
                ]
            }
        });

        // Check if old content exists and set it in Quill
        var oldContent = @json(old('content', $service->content));

        if (oldContent) {
            quill.root.innerHTML = oldContent;  // Set old content directly in the Quill editor
        }

        // On form submission, set the hidden textarea to the Quill content
        document.querySelector('form').onsubmit = function() {
            var content = quill.root.innerHTML;
            document.querySelector('textarea[name="content"]').value = content;
        };
    });
</script>
    </form>
</div>
@endsection
