@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Careers List</h1>
        <a href="{{ route('admin.career.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Add New</a>
    </div>

    @if($whyJoinUs)
    <div class="mb-6 p-4 bg-gray-50 border rounded flex justify-between items-center">
        <div><strong>Static Page:</strong> {{ $whyJoinUs->title }}</div>
        <a href="{{ route('admin.career.edit', ['type' => 'page', 'id' => $whyJoinUs->id]) }}" class="text-indigo-600 font-bold">Edit Content</a>
    </div>
    @endif

    <div class="mb-8">
        <h2 class="text-xl font-bold mb-4">Professional Jobs</h2>
        <table class="w-full border bg-white shadow-sm">
            <thead class="bg-gray-50 border-b">
                <tr><th class="p-3 text-left">Title</th><th class="p-3 text-left">Location</th><th class="p-3">Status</th><th class="p-3">Actions</th></tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $job->title }}</td>
                    <td class="p-3">{{ $job->location }}</td>
                    <td class="p-3 text-center"><span class="px-2 py-1 rounded text-xs {{ $job->status == 'open' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ strtoupper($job->status) }}</span></td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.career.edit', ['type' => 'job', 'id' => $job->id]) }}" class="text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <h2 class="text-xl font-bold mb-4">Internships</h2>
        <table class="w-full border bg-white shadow-sm">
            <thead class="bg-gray-50 border-b">
                <tr><th class="p-3 text-left">Title</th><th class="p-3 text-left">Duration</th><th class="p-3">Status</th><th class="p-3">Actions</th></tr>
            </thead>
            <tbody>
                @foreach($internships as $intern)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $intern->title }}</td>
                    <td class="p-3">{{ $intern->duration }}</td>
                    <td class="p-3 text-center"><span class="px-2 py-1 rounded text-xs {{ $intern->status == 'open' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ strtoupper($intern->status) }}</span></td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.career.edit', ['type' => 'internship', 'id' => $intern->id]) }}" class="text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
