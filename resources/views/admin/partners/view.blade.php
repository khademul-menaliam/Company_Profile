@extends('admin.layouts.app')
@section('title', 'View Partner | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Partner Details</h1>

    <div class="bg-white shadow p-6 rounded-lg space-y-4">
        <div>
            <strong>Name:</strong> {{ $partner->name }}
        </div>
        <div>
            <strong>Description:</strong> {{ $partner->description ?? '-' }}
        </div>
        <div>
            <strong>Website:</strong> 
            @if($partner->website_url)
                <a href="{{ $partner->website_url }}" class="text-blue-600 hover:underline" target="_blank">{{ $partner->website_url }}</a>
            @else
                -
            @endif
        </div>
        <div>
            <strong>Email:</strong> {{ $partner->email ?? '-' }}
        </div>
        <div>
            <strong>Phone:</strong> {{ $partner->phone ?? '-' }}
        </div>
        <div>
            <strong>Status:</strong> 
            @if($partner->status == 'active')
                <span class="text-green-600 font-semibold">Active</span>
            @else
                <span class="text-red-600 font-semibold">Inactive</span>
            @endif
        </div>
        <div>
            <strong>Logo:</strong>
            @if($partner->logo)
                <img src="{{ asset('storage/'.$partner->logo) }}" class="w-32 h-32 object-cover rounded mt-2">
            @else
                <span class="text-gray-400 italic">No Logo</span>
            @endif
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.partners.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Partners</a>
    </div>
</div>
@endsection
