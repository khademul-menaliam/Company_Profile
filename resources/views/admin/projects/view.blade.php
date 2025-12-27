@extends('admin.layouts.app')
@section('title', 'View Project | Admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <h1 class="text-3xl font-bold mb-6">Project Details</h1>

    <div class="bg-white p-6 rounded-lg shadow-md space-y-10">

        {{-- Top Info --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="space-y-4">
                <div>
                    <h2 class="font-semibold text-gray-700">Timeline</h2>
                    <p>{{ $project->timeline ?? 'N/A' }}</p>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-700">Project Type</h2>
                    <p>{{ $project->type ?? 'N/A' }}</p>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-700">Location</h2>
                    <p>{{ $project->location ?? 'N/A' }}</p>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-700">Title</h2>
                    <p class="text-gray-900">{{ $project->title }}</p>
                </div>
            </div>

            {{-- Image --}}
            <div class="flex flex-col items-center">
                <h2 class="font-semibold text-gray-700 mb-3">Featured Image</h2>
                @if($project->image)
                    <img src="{{ asset('storage/'.$project->image) }}"
                         class="w-64 h-64 object-cover rounded-lg shadow border">
                @else
                    <div class="w-64 h-64 flex items-center justify-center bg-gray-100 text-gray-500 rounded border">
                        No Image
                    </div>
                @endif
            </div>
        </div>

        {{-- Content Sections --}}
        <div class="space-y-4">

            <div>
                <h2 class="font-semibold text-gray-700 mb-2">Results / Outcome</h2>
                <div class="prose max-w-none">
                    {!! $project->results ?? '<em>Not specified.</em>' !!}
                </div>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700 mb-2">Solution / Approach</h2>
                <div class="prose max-w-none">
                    {!! $project->solution ?? '<em>Not specified.</em>' !!}
                </div>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700 mb-2">Challenge / Objectives</h2>
                <div class="prose max-w-none">
                    {!! $project->objectives ?? '<em>Not specified.</em>' !!}
                </div>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700 mb-2">Project Description</h2>
                <div class="prose max-w-none">
                    {!! $project->description ?? '<em>No description provided.</em>' !!}
                </div>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700 mb-2">Client</h2>
                <p>{{ $project->client->name ?? 'N/A' }}</p>
            </div>

        </div>

        {{-- Gallery --}}
        <div>
            <h2 class="font-semibold text-gray-700 mb-3">Gallery Images</h2>
            <div class="flex gap-3 flex-wrap">
                @forelse($project->gallery as $img)
                    <img src="{{ asset('storage/'.$img->image) }}"
                         class="w-24 h-24 object-cover rounded shadow border">
                @empty
                    <p class="text-gray-500">No gallery images uploaded.</p>
                @endforelse
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.projects.edit', $project->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow">
                Edit Project
            </a>

            <a href="{{ route('admin.projects.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded shadow">
                Back to List
            </a>
        </div>

    </div>
</div>
@endsection
