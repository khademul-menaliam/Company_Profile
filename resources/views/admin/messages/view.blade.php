@extends('admin.layouts.app')

@section('title', 'Message Details | Admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-3xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Message Details</h2>

  <p><strong>Name:</strong> {{ $message->name }}</p>
  <p><strong>Email:</strong> {{ $message->email }}</p>
  <p><strong>Subject:</strong> {{ $message->subject }}</p>
  <p><strong>Date:</strong> {{ $message->created_at->format('d M Y H:i A') }}</p>

  <hr class="my-4">

  <p class="whitespace-pre-line">{{ $message->message }}</p>

  <div class="mt-6 flex justify-end">
    <a href="{{ route('admin.messages.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Back</a>
  </div>
</div>
@endsection
