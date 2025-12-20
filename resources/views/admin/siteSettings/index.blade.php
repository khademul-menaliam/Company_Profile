@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Site Settings</h2>
    <a href="{{ route('admin.settings.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
      + Add Setting
    </a>
  </div>

  @if($settings->count())
    <table class="w-full text-sm text-left border">
      <thead class="bg-gray-100 border-b">
        <tr>
          <th class="py-2 px-3">#</th>
          <th class="py-2 px-3">Setting Key</th>
          <th class="py-2 px-3">Setting Value</th>
          <th class="py-2 px-3">Type</th>
          <th class="py-2 px-3 text-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($settings as $setting)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-3">{{ $loop->iteration }}</td>
            <td class="py-2 px-3 font-semibold">{{ $setting->setting_key }}</td>
            <td class="py-2 px-3">
              @if($setting->setting_type == 'image' && $setting->setting_value)
                <img src="{{ asset('storage/'.$setting->setting_value) }}" class="h-10" >
              @else
                {{ $setting->setting_value ?? 'N/A' }}
              @endif
            </td>
            <td class="py-2 px-3">
              @if($setting->setting_type == 'text')
                Text
              @elseif($setting->setting_type == 'image')
                Image
              @elseif($setting->setting_type == 'url')
                URL
              @elseif($setting->setting_type == 'boolean')
                Boolean
              @endif
            </td>
            <td class="py-2 px-3 text-right">
                <a href="{{ route('admin.settings.show', $setting->id) }}" class="text-indigo-600 hover:underline">
                    View Details
                </a>
              <a href="{{ route('admin.settings.edit', $setting->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
              <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline" onclick="return confirm('Delete this setting?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p class="text-gray-500 text-center py-4">No site settings found.</p>
  @endif

  {{-- Pagination --}}
  <div class="mt-4">
      {{ $settings->links() }}
  </div>
</div>
@endsection
