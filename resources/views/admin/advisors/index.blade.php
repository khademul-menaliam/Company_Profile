@extends('admin.layouts.app')
@section('title', 'Advisors | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Advisors</h1>
        <a href="{{ route('admin.advisors.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Advisor</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded-lg border border-gray-200">
            <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                <tr>
                    <th class="py-3 px-4 border-b border-gray-200">Sl No</th>
                    <th class="py-3 px-4 border-b border-gray-200">Name</th>
                    <th class="py-3 px-4 border-b border-gray-200">Image</th>
                    <th class="py-3 px-4 border-b border-gray-200">Message</th>
                    <th class="py-3 px-4 border-b border-gray-200 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($advisors as $advisor)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $advisor->name }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            @if($advisor->image)
                                <img src="{{ asset('storage/'.$advisor->image) }}" class="w-16 h-16 object-cover rounded" alt="{{ $advisor->name }}">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $advisor->message }}</td>
                        <td class="py-3 px-4 border-b border-gray-200 text-center">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.advisors.edit', $advisor->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                <a href="{{ route('admin.advisors.show', $advisor->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">View</a>
                                <form action="{{ route('admin.advisors.destroy', $advisor->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this advisor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500 italic">No advisors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $advisors->links() }}
    </div>
</div>
@endsection
