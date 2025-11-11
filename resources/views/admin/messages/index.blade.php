@extends('admin.layouts.app')

@section('title', 'Messages | Admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
  <h2 class="text-2xl font-bold mb-4">All Messages</h2>

  @if($messages->count() > 0)
    <table class="w-full text-sm text-left">
      <thead class="border-b bg-gray-100">
        <tr>
          <th class="py-2 px-3">#</th>
          <th class="py-2 px-3">Name</th>
          <th class="py-2 px-3">Email</th>
          <th class="py-2 px-3">Subject</th>
          <th class="py-2 px-3">Date</th>
          <th class="py-2 px-3 text-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($messages as $message)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-3">{{ $loop->iteration }}</td>
            <td class="py-2 px-3">{{ $message->name }}</td>
            <td class="py-2 px-3">{{ $message->email }}</td>
            <td class="py-2 px-3">{{ $message->subject }}</td>
            <td class="py-2 px-3">{{ $message->created_at->format('d M Y') }}</td>
            <td class="py-2 px-3 text-right">
              <a href="{{ route('admin.messages.show', $message->id) }}" class="text-indigo-600 hover:underline">View</a> |
              <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this message?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p class="text-gray-500 text-center py-4">No messages found.</p>
  @endif
</div>
@endsection
