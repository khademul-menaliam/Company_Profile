@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $model->title }}</h1>

    <div class="mb-3">
        <strong>Type:</strong> {{ ucfirst($type) }}
    </div>
    <div class="mb-3">
        <strong>Location:</strong> {{ $model->location }}
    </div>
    <div class="mb-3">
        <strong>Deadline:</strong> {{ $model->deadline }}
    </div>
    <div class="mb-3">
        <strong>Description:</strong>
        <p class="mt-1">{{ $model->description }}</p>
    </div>

    <a href="{{ route('admin.career.edit', ['type' => $type, 'id' => $model->id]) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit</a>
    <a href="{{ route('admin.career.index') }}" class="ml-2 text-gray-700">Back</a>
</div>
@endsection
