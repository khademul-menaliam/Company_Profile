@extends('admin.layouts.app')
@section('title', 'Partner Dashboard | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Partners</h1>
        <a href="{{ route('admin.partners.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Partner</a>
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
                    <th class="py-3 px-4 border-b border-gray-200">Logo</th>
                    <th class="py-3 px-4 border-b border-gray-200">Status</th>
                    <th class="py-3 px-4 border-b border-gray-200 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($partners as $partner)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $partner->name }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            @if($partner->logo)
                                <img src="{{ asset('storage/'.$partner->logo) }}" alt="Partner Logo" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">No Logo</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            @if($partner->status)
                                <span class="text-green-600 font-semibold">Active</span>
                            @else
                                <span class="text-red-600 font-semibold">Inactive</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b border-gray-200 text-center">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                <a href="{{ route('admin.partners.show', $partner->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">View</a>
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Delete this partner?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500 italic">No partners found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    {{-- <div class="mt-4">
        {{ $partners->links() }}
    </div> --}}
</div>
@endsection
