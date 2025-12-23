@extends('admin.layouts.app')
@section('title', 'Edit Advisor | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Advisor</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.advisors.update', $person->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name', $person->name) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Message</label>
            <textarea name="message" class="w-full border px-3 py-2 rounded" rows="4">{{ old('message', $person->message) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Image</label>
            <input type="file" name="image" accept="image/*">
            @if($person->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$person->image) }}" alt="{{ $person->name }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update Advisor</button>
        <a href="{{ route('admin.advisors.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection
