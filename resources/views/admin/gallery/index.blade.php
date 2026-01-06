@extends('admin.layouts.app')
@section('title', 'Gallery | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Gallery</h1>
        <a href="{{ route('admin.gallery.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Media
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded-lg border border-gray-200">

            <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                <tr>
                    <th class="py-3 px-4 border-b">Sl No</th>
                    <th class="py-3 px-4 border-b">Title</th>
                    <th class="py-3 px-4 border-b">Preview</th>
                    <th class="py-3 px-4 border-b">Status</th>
                    <th class="py-3 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($galleryItems as $item)
                    <tr class="hover:bg-gray-50 transition-colors">

                        <td class="py-3 px-4 border-b">
                            {{ $loop->iteration }}
                        </td>

                        <td class="py-3 px-4 border-b">
                            {{ $item->title ?? '-' }}
                        </td>

                        <td class="py-3 px-4 border-b">
                            @if($item->isVideo())
                                <video class="w-24 h-16 rounded border" muted>
                                    <source src="{{ asset('storage/'.$item->image) }}">
                                </video>
                            @else
                                <img src="{{ asset('storage/'.$item->image) }}"
                                     class="w-24 h-16 object-cover rounded border">
                            @endif
                        </td>

                        <td class="py-3 px-4 border-b">
                            @if($item->status)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Active
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td class="py-3 px-4 border-b text-center">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.gallery.edit', $item->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.gallery.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this item?');">
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
                        <td colspan="5" class="text-center py-6 text-gray-500 italic">
                            No gallery items found.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection
