@extends('admin.layouts.app')
@section('title', 'Add Client | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Add Client</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Company</label>
            <input type="text" name="company" value="{{ old('company') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Logo</label>
            <input type="file" name="logo" class="w-full border px-3 py-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Client</button>
        <a href="{{ route('admin.clients.index') }}" class="ml-2 text-gray-600 hover:underline">Back</a>
    </form>
</div>
@endsection
