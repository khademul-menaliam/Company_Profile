@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit {{ ucfirst($type) }}</h1>

    <form action="{{ route('admin.career.update', ['type' => $type, 'id' => $model->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $model->title) }}" class="w-full border p-2 rounded">
            @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="5" class="w-full border p-2 rounded">{{ old('description', $model->description) }}</textarea>
            @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Location</label>
            <input type="text" name="location" value="{{ old('location', $model->location) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline', $model->deadline?->format('Y-m-d')) }}" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.career.index') }}" class="ml-2 text-gray-700">Cancel</a>
    </form>
</div>
@endsection
