@extends('admin.layouts.app')
@section('title', 'View Advisor | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Advisor Details</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <div class="flex flex-col md:flex-row md:items-center gap-6">
            @if($person->image)
                <img src="{{ asset('storage/'.$person->image) }}" alt="{{ $person->name }}" class="w-32 h-32 object-cover rounded">
            @endif
            <div>
                <h2 class="text-xl font-semibold">{{ $person->name }}</h2>
                <p class="mt-2">{{ $person->message }}</p>
            </div>
        </div>

        <a href="{{ route('admin.advisors.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Back to Advisors</a>
    </div>
</div>
@endsection
