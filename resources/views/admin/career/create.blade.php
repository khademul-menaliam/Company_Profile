@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Add Career Item</h1>

    <form action="{{ route('admin.career.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="job">Job Vacancy</option>
                <option value="internship">Internship</option>
            </select>
            @error('type') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border p-2 rounded">
            @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="5" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
            @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Location</label>
            <input type="text" name="location" value="{{ old('location') }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline') }}" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Add</button>
        <a href="{{ route('admin.career.index') }}" class="ml-2 text-gray-700">Cancel</a>
    </form>
</div>
@endsection
