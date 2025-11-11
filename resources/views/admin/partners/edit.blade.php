@extends('admin.layouts.app')

@section('title', 'Edit Client')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Edit Client</h2>

  <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label class="block mb-1 font-semibold">Client Name</label>
      <input type="text" name="name" value="{{ $client->name }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1 font-semibold">Website</label>
      <input type="text" name="website" value="{{ $client->website }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
      <label class="block mb-1 font-semibold">Logo</label>
      @if($client->logo)
        <img src="{{ asset('uploads/clients/'.$client->logo) }}" class="h-12 mb-2">
      @endif
      <input type="file" name="logo" class="w-full border rounded px-3 py-2">
    </div>

    <div class="flex justify-end">
      <a href="{{ route('admin.clients.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 mr-2">Cancel</a>
      <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update</button>
    </div>
  </form>
</div>
@endsection
