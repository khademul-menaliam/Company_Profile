@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Site Settings</h2>

    <a href="{{ route('admin.settings.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition duration-200">
      + Add Setting
    </a>
  </div>

  @if($settings->count())
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
          <tr>
            <th class="py-3 px-4 border-b">#</th>
            <th class="py-3 px-4 border-b">Setting Key</th>
            <th class="py-3 px-4 border-b">Setting Value</th>
            <th class="py-3 px-4 border-b">Type</th>
            <th class="py-3 px-4 border-b text-right">Actions</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @foreach($settings as $setting)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4">{{ $loop->iteration }}</td>

              <td class="py-3 px-4 font-semibold text-gray-800">
                {{ $setting->setting_key }}
              </td>

              {{-- VALUE COLUMN --}}
                <td class="py-2 px-3">
                    @if($setting->setting_type == 'image' && $setting->setting_value)
                        <img src="{{ asset($setting->setting_value) }}" class="h-10 rounded">
                    @elseif($setting->setting_type == 'file' && $setting->setting_value)
                        {{-- Show a PDF icon and filename --}}
                        <a href="{{ asset($setting->setting_value) }}" target="_blank" class="inline-flex items-center space-x-1 text-indigo-600 hover:underline">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0L3 5v19h18V5L12 0zm0 2.18l7 3.18v14.64H5V5.36l7-3.18zM11 7v10h2V7h-2zm0 12h2v2h-2v-2z"/>
                            </svg>
                            <span class="truncate max-w-xs">{{ basename($setting->setting_value) }}</span>
                        </a>
                    @else
                        {{ $setting->setting_value ?? 'N/A' }}
                    @endif
                </td>

              {{-- TYPE BADGE --}}
              <td class="py-3 px-4">
                @php
                    $colors = [
                        'text' => 'bg-gray-100 text-gray-700',
                        'image' => 'bg-blue-100 text-blue-700',
                        'url' => 'bg-indigo-100 text-indigo-700',
                        'boolean' => 'bg-purple-100 text-purple-700',
                        'file' => 'bg-yellow-100 text-yellow-700',
                    ];
                @endphp

                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$setting->setting_type] ?? 'bg-gray-100 text-gray-700' }}">
                    {{ ucfirst($setting->setting_type) }}
                </span>
              </td>

              {{-- ACTIONS --}}
              <td class="py-3 px-4 text-right space-x-3">
                <a href="{{ route('admin.settings.show', $setting->id) }}"
                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                   View
                </a>

                <a href="{{ route('admin.settings.edit', $setting->id) }}"
                   class="text-blue-600 hover:text-blue-800 font-medium">
                   Edit
                </a>

                <form action="{{ route('admin.settings.destroy', $setting->id) }}"
                      method="POST"
                      class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="text-red-600 hover:text-red-800 font-medium"
                          onclick="return confirm('Delete this setting?')">
                      Delete
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-center py-10 text-gray-500">
      No site settings found.
    </div>
  @endif

  <div class="mt-6">
      {{ $settings->links() }}
  </div>
</div>
@endsection
