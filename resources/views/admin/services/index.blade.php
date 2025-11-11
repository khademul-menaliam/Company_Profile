@extends('admin.layouts.app')
@section('title', 'Services Dashboard | Admin')

@section('content')
<div class="container mx-auto px-4 py-0">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Services</h1>
        <a href="{{ route('admin.services.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Service</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded-lg border border-gray-200">
            <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                <tr>
                    <th class="py-3 px-4 border-b border-gray-200">Sl No</th>
                    <th class="py-3 px-4 border-b border-gray-200">Title</th>
                    <th class="py-3 px-4 border-b border-gray-200">Image</th>
                    <th class="py-3 px-4 border-b border-gray-200 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @php $counter = 1; @endphp
                @forelse($services as $parent)
                    {{-- Parent Service --}}
                    <tr class="bg-gray-50 hover:bg-gray-200 transition-colors font-semibold">
                        <td class="py-3 px-4 border-b border-gray-200">{{ $counter++ }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $parent->title }}</td>
                        <td class="py-1 px-1 border-b border-gray-200">
                            @if($parent->image)
                                <img src="{{ asset($parent->image) }}" alt="Service Image" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b border-gray-200 text-center">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.services.edit', $parent->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                <a href="{{ route('admin.services.show', $parent->slug) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">View</a>
                                <form action="{{ route('admin.services.destroy', $parent->id) }}" method="POST" onsubmit="return confirm('Delete this service?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    {{-- Child Services --}}
                    @foreach($parent->children as $child)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="py-3 px-4 border-b border-gray-200">—</td>
                            <td class="py-3 px-4 border-b border-gray-200 pl-8 text-gray-700">↳ {{ $child->title }}</td>
                            <td class="py-1 px-1 border-b border-gray-200">
                                @if($child->image)
                                    <img src="{{ asset($child->image) }}" alt="Service Image" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400 italic">No Image</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 border-b border-gray-200 text-center">
                                <div class="inline-flex gap-2">
                                    <a href="{{ route('admin.services.edit', $child->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                    <a href="{{ route('admin.services.show', $child->slug) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">View</a>
                                    <form action="{{ route('admin.services.destroy', $child->id) }}" method="POST" onsubmit="return confirm('Delete this child service?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500 italic">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <div class="mt-4">
        {{ $services->links() }}
    </div>

</div>

@endsection
