@extends('admin.layouts.app')
@section('title', 'View Team Member | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Team Member Details</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <div class="flex flex-col md:flex-row md:items-center gap-6">
            @if($person->image)
                <img src="{{ asset('storage/'.$person->image) }}" alt="{{ $person->name }}" class="w-32 h-32 object-cover rounded">
            @endif
            <div>
                <h2 class="text-xl font-semibold">{{ $person->name }}</h2>
                @if($person->position)
                    <p class="text-gray-600"><strong>Position:</strong> {{ $person->position }}</p>
                @endif
                @if($person->message)
                    <p class="mt-2">{{ $person->message }}</p>
                @endif
            </div>
        </div>

        <a href="{{ route('admin.team_members.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Back to Team Members</a>
    </div>
</div>
@endsection
