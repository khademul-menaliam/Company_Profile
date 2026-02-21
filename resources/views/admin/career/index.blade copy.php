@extends('admin.layouts.app')

@section('content')
<div class="p-6">
  <h1 class="text-2xl font-bold mb-4">Career Section</h1>

  <div class="mb-6">
    <h2 class="text-xl font-semibold mb-2">Why Join Us</h2>
    <a href="{{ route('admin.career.edit', ['type' => 'page', 'id' => $whyJoinUs->id]) }}" class="bg-indigo-600 text-white px-4 py-2 rounded">Edit Page</a>
  </div>

  <div class="mb-6">
    <div class="flex justify-between items-center mb-3">
      <h2 class="text-xl font-semibold">Job Vacancies</h2>
      <a href="{{ route('admin.career.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Add New</a>
    </div>
    <table class="w-full border">
      <thead>
        <tr class="bg-gray-100">
          <th class="p-2 text-left">Title</th>
          <th class="p-2">Location</th>
          <th class="p-2">Deadline</th>
          <th class="p-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobs as $job)
        <tr class="border-t">
          <td class="p-2">{{ $job->title }}</td>
          <td class="p-2">{{ $job->location }}</td>
          <td class="p-2">{{ $job->deadline }}</td>
          <td class="p-2">
            <a href="{{ route('admin.career.edit', ['type' => 'job', 'id' => $job->id]) }}" class="text-blue-600">Edit</a>
            <form action="{{ route('admin.career.destroy', ['type' => 'job', 'id' => $job->id]) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Delete this job?')" class="text-red-600 ml-2">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div>
    <h2 class="text-xl font-semibold mb-3">Internships</h2>
    <table class="w-full border">
      <thead>
        <tr class="bg-gray-100">
          <th class="p-2 text-left">Title</th>
          <th class="p-2">Location</th>
          <th class="p-2">Deadline</th>
          <th class="p-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($internships as $intern)
        <tr class="border-t">
          <td class="p-2">{{ $intern->title }}</td>
          <td class="p-2">{{ $intern->location }}</td>
          <td class="p-2">{{ $intern->deadline }}</td>
          <td class="p-2">
            <a href="{{ route('admin.career.edit', ['type' => 'internship', 'id' => $intern->id]) }}" class="text-blue-600">Edit</a>
            <form action="{{ route('admin.career.destroy', ['type' => 'internship', 'id' => $intern->id]) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button onclick="return confirm('Delete this internship?')" class="text-red-600 ml-2">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
