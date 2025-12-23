@extends('admin.layouts.app')
@section('title', 'Client Dashboard | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Clients</h1>
        <a href="{{ route('admin.clients.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Client</a>
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
                    <th class="py-3 px-4 border-b border-gray-200">Company</th>
                    <th class="py-3 px-4 border-b border-gray-200">Logo</th>
                    <th class="py-3 px-4 border-b border-gray-200">Email</th>
                    <th class="py-3 px-4 border-b border-gray-200">Phone</th>
                    <th class="py-3 px-4 border-b border-gray-200 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($clients as $client)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $client->name }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $client->company ?? '-' }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            @if($client->logo)
                                <img src="{{ asset('storage/'.$client->logo) }}" alt="Client Logo" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">No Logo</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $client->email ?? '-' }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $client->phone ?? '-' }}</td>
                        <td class="py-3 px-4 border-b border-gray-200 text-center">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.clients.edit', $client->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                <a href="{{ route('admin.clients.show', $client->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">View</a>
                                <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Delete this client?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500 italic">No clients found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    {{-- <div class="mt-4">
        {{ $clients->links() }}
    </div> --}}
</div>
@endsection
