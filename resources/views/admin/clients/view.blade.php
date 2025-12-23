@extends('admin.layouts.app')
@section('title', 'View Client | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Client Details</h1>

    <div class="bg-white shadow rounded-lg p-6 space-y-4">
        <div>
            <strong>Name:</strong> {{ $client->name }}
        </div>
        <div>
            <strong>Company:</strong> {{ $client->company ?? '-' }}
        </div>
        <div>
            <strong>Email:</strong> {{ $client->email ?? '-' }}
        </div>
        <div>
            <strong>Phone:</strong> {{ $client->phone ?? '-' }}
        </div>
        <div>
            <strong>Logo:</strong><br>
            @if($client->logo)
                <img src="{{ asset('storage/'.$client->logo) }}" alt="Client Logo" class="w-32 h-32 object-cover rounded mt-2">
            @else
                <span class="text-gray-400 italic">No Logo</span>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.clients.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Back to Clients</a>
</div>
@endsection
