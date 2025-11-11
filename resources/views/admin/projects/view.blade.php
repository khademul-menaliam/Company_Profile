@extends('admin.layouts.app')
@section('title', 'View projects | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">project Details</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Left Section -->
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Title</h2>
                <p class="text-gray-900 mb-4">{{ $project->title }}</p>

                <h2 class="text-lg font-semibold text-gray-700 mb-2">Short Description</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    {{ $project->short_description ?? 'No description provided.' }}
                </p>

                <h2 class="text-lg font-semibold text-gray-700 mb-2">Status</h2>
                <p>
                    @if($project->status)
                        <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Active</span>
                    @else
                        <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">Inactive</span>
                    @endif
                </p>

                <h2 class="text-lg font-semibold text-gray-700 mt-6 mb-2">Sort Order</h2>
                <p class="text-gray-800">{{ $project->sort_order ?? 'N/A' }}</p>
            </div>

            <!-- Right Section -->
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Project Image</h2>
                @if($project->image)
                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}"
                         class="w-64 h-64 object-cover rounded-lg shadow-md border">
                @else
                    <div class="w-64 h-64 flex items-center justify-center bg-gray-100 text-gray-500 rounded-lg border">
                        No Image Available
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-8 flex justify-between">
            <a href="{{ route('admin.projects.edit', $project->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow transition">
                Edit project
            </a>

            <a href="{{ route('admin.projects.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded shadow transition">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection
