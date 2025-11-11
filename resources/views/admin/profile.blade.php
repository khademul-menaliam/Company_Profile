@extends('admin.layouts.app')
@section('title', 'Admin Profile')

@section('content')
<div class="container mx-auto px-4 py-0">

    <!-- Header -->
    <div class="flex items-center justify-between mb-2">
        <h1 class="text-2xl font-semibold text-gray-800">Admin Profile</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">
            ← Back to Dashboard
        </a>
    </div>

    <!-- Profile Card -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden min-h-[650px]">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-32"></div>

        <div class="p-6 relative">
            <div class="absolute -top-16 left-8">
                @if(auth()->user()->profile_photo)
                    <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                         alt="Profile"
                         class="w-28 h-28 rounded-full border-4 border-white shadow-lg object-cover">
                @else
                    <div class="w-28 h-28 rounded-full border-4 border-white shadow-lg flex items-center justify-center bg-gray-200 text-gray-600 text-3xl font-semibold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <div class="ml-40 mt-4">
                <h2 class="text-2xl font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                <p class="text-gray-600">{{ auth()->user()->email }}</p>
                <p class="text-sm text-gray-500 mt-1">Role:
                    <span class="font-medium">{{ auth()->user()->roles->pluck('name')->join(', ') }}</span>
                </p>
            </div>

            <hr class="my-6">

            <!-- Update Form -->
            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="password" placeholder="Leave blank to keep current"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        <input type="file" name="profile_photo" accept="image/*"
                               class="mt-1 w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                               file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                               hover:file:bg-blue-100">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
