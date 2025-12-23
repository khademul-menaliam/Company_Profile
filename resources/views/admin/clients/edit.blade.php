@extends('admin.layouts.app')
@section('title', 'Edit Client | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Client</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name', $client->name) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Company</label>
            <input type="text" name="company" value="{{ old('company', $client->company) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $client->email) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $client->phone) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Logo</label>
            <input type="file" name="logo" class="w-full border px-3 py-2 rounded">
            @if($client->logo)
                <img src="{{ asset('storage/'.$client->logo) }}" alt="Client Logo" class="mt-2 w-24 h-24 object-cover rounded">
            @endif
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update Client</button>
        <a href="{{ route('admin.clients.index') }}" class="ml-2 text-gray-600 hover:underline">Back</a>
    </form>
</div>
@endsection
