@extends('admin.layouts.app')
@section('title', 'Company Sections')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Company Sections</h1>
        <a href="{{ route('admin.company-sections.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           Add Section
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">Title</th>
                    <th class="p-3">Full Name</th>
                    <th class="p-3">Type</th>
                    <th class="p-3">Image</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($sections as $section)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $loop->iteration }}</td>

                        <td class="p-3 font-medium">
                            {{ $section->title ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $section->subtitle ?? '-' }}
                        </td>

                        <td class="p-3 capitalize">
                            {{ $section->type }}
                        </td>

                        <td class="p-3">
                            @if($section->image)
                                <img src="{{ asset('storage/'.$section->image) }}"
                                     class="w-14 h-14 object-cover rounded border">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>

                        <td class="p-3">
                            @if($section->status)
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                    Active
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td class="p-3 text-center">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.company-sections.edit', $section->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.company-sections.destroy', $section->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this section?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-6 text-gray-500">
                            No records found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
