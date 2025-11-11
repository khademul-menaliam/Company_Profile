@extends('admin.layouts.app')

@section('title', 'Client Details')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Client Details</h2>

    <div class="space-y-4">
        <div>
            <span class="font-semibold text-gray-700">Client Name:</span>
            <p class="text-lg">{{ $client->name }}</p>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Website:</span>
            <p>{{ $client->website ?? 'N/A' }}</p>
        </div>

        @if($client->logo)
            <div>
                <span class="font-semibold text-gray-700">Logo:</span>
                <div class="mt-2">
                    <img src="{{ asset('images/'.$client->logo) }}" alt="{{ $client->name }}" class="h-24 rounded border">
                </div>
            </div>
        @endif

        {{-- <div>
            <span class="font-semibold text-gray-700">Created At:</span>
            <p>{{ $client->created_at->format('d M, Y h:i A') }}</p>
        </div> --}}
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('admin.clients.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
            Back to List
        </a>
    </div>
</div>
@endsection
