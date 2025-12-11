@extends('admin.layout')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Why Join Us Page</h1>

    <form action="{{ route('admin.career.update', ['type' => 'page', 'id' => $whyJoinUs->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $whyJoinUs->title) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Subtitle</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $whyJoinUs->subtitle) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Content</label>
            <textarea name="content" rows="8" class="w-full border p-2 rounded">{!! old('content', $whyJoinUs->content) !!}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Banner Image</label>
            <input type="file" name="banner_image" class="w-full border p-2 rounded">
            @if($whyJoinUs->banner_image)
                <img src="{{ asset('storage/'.$whyJoinUs->banner_image) }}" class="mt-2 w-40 h-24 object-cover rounded">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Page</button>
    </form>
</div>
@endsection
