@extends('admin.layouts.app')

@section('title', 'Clients')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">All Clients</h2>
    <a href="{{ route('admin.clients.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
      + Add Client
    </a>
  </div>

  @if($clients->count())
    <table class="w-full text-sm text-left border">
      <thead class="bg-gray-100 border-b">
        <tr>
          <th class="py-2 px-3">#</th>
          <th class="py-2 px-3">Client Name</th>
          <th class="py-2 px-3">Logo</th>
          <th class="py-2 px-3">Website</th>
          <th class="py-2 px-3 text-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clients as $client)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-3">{{ $loop->iteration }}</td>
            <td class="py-2 px-3 font-semibold">{{ $client->name }}</td>
            <td class="py-2 px-3">
              @if($client->logo)
                <img src="{{ asset('uploads/clients/'.$client->logo) }}" class="h-10" alt="{{ $client->name }}">
              @else
                <span class="text-gray-400">No Logo</span>
              @endif
            </td>
            <td class="py-2 px-3">{{ $client->website ?? '-' }}</td>
            <td class="py-2 px-3 text-right">
                <a href="{{ route('admin.clients.show', $client->id) }}" class="text-indigo-600 hover:underline">
                    View Details
                </a>
              <a href="{{ route('admin.clients.edit', $client->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
              <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline" onclick="return confirm('Delete this client?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p class="text-gray-500 text-center py-4">No clients found.</p>
  @endif

  {{-- pagination appear --}}
    <div class="mt-4">
        {{ $clients->links() }}
    </div>
</div>
@endsection
