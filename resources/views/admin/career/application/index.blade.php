@extends('admin.layouts.app') {{-- Use your admin layout here --}}

@section('content')
<div class="p-6 bg-white rounded-xl shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Career Applications</h2>
        <span class="bg-indigo-100 text-indigo-700 px-4 py-1 rounded-full text-sm font-semibold">
            Total: {{ $applications->count() }}
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-4 font-semibold text-gray-600">Applicant</th>
                    <th class="p-4 font-semibold text-gray-600">Type</th>
                    <th class="p-4 font-semibold text-gray-600">Applied For</th>
                    <th class="p-4 font-semibold text-gray-600">Contact</th>
                    <th class="p-4 font-semibold text-gray-600">Documents</th>
                    <th class="p-4 font-semibold text-gray-600">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4">
                        <div class="font-bold text-gray-800">{{ $app->applicant_name }}</div>
                        <div class="text-xs text-gray-500">{{ $app->email }}</div>
                    </td>
                    <td class="p-4">
                        @if($app->job_id)
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Job</span>
                        @else
                            <span class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Intern</span>
                        @endif
                    </td>
                    <td class="p-4 text-sm text-gray-700">
                        {{-- Shows Job Title or Internship Title --}}
                        {{ $app->job->title ?? $app->internship->title ?? 'N/A' }}
                    </td>
                    <td class="p-4 text-sm">
                        <div class="flex flex-col">
                            <span><i class="fas fa-phone mr-1 text-gray-400"></i> {{ $app->phone }}</span>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex space-x-2">
                            <a href="{{ asset('storage/' . $app->resume) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm flex items-center">
                                <i class="fas fa-file-pdf mr-1"></i> Resume
                            </a>
                            @if($app->cover_letter)
                                <button onclick="alert('{{ addslashes($app->cover_letter) }}')" class="text-gray-500 hover:text-gray-700 text-sm">
                                    <i class="fas fa-sticky-note"></i> Note
                                </button>
                            @endif
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-500">
                        {{ $app->created_at->format('d M, Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-10 text-center text-gray-400">
                        <i class="fas fa-inbox text-4xl mb-2"></i>
                        <p>No applications received yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
