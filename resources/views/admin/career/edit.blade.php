@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit {{ ucfirst($type) }}</h1>
    <form action="{{ route('admin.career.update', ['type' => $type, 'id' => $item->id]) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block font-bold">Title</label>
            <input type="text" name="title" value="{{ $item->title }}" class="w-full border p-2 rounded">
        </div>

        @if($type === 'page')
            <div class="mb-4"><label class="block font-bold">Subtitle</label><input type="text" name="subtitle" value="{{ $item->subtitle }}" class="w-full border p-2 rounded"></div>
            <div class="mb-4"><label class="block font-bold">Content</label><textarea name="content" class="summernote">{{ $item->content }}</textarea></div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block font-bold">Location</label>
                    <input type="text" name="location" value="{{ $item->location }}" class="w-full border p-2 rounded">
                </div>
                @if($type === 'job')
                <div>
                    <label class="block font-bold">Job Type</label>
                    <select name="type" class="w-full border p-2 rounded">
                        <option value="full-time" {{ $item->type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ $item->type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="contract" {{ $item->type == 'contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                </div>
                @else
                <div>
                    <label class="block font-bold">Duration</label>
                    <input type="text" name="duration" value="{{ $item->duration }}" class="w-full border p-2 rounded">
                </div>
                @endif
                <div>
                    <label class="block font-bold">Deadline</label>
                    <input type="date" name="deadline" value="{{ $item->deadline ? \Carbon\Carbon::parse($item->deadline)->format('Y-m-d') : '' }}" class="w-full border p-2 rounded">
                </div>
            </div>

            <div class="mb-4"><label class="block font-bold">Description</label><textarea name="description" class="summernote">{{ $item->description }}</textarea></div>
            <div class="mb-4"><label class="block font-bold">Requirements</label><textarea name="requirements" class="summernote">{{ $item->requirements }}</textarea></div>
            <div class="mb-4"><label class="block font-bold">Benefits</label><textarea name="benefits" class="summernote">{{ $item->benefits }}</textarea></div>

            <div class="mb-4">
                <label class="block font-bold">Status</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="open" {{ $item->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ $item->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    <option value="draft" {{ $item->status == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
        @endif

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update {{ ucfirst($type) }}</button>
    </form>
</div>
@include('admin.career.partials.summernote')
@endsection
