@extends('admin.layouts.app')
@section('title', 'Project Dashboard | Admin')

@section('content')
<div class="container mx-auto px-4 py-8">

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">{{ session('success') }}</div>
    @endif

<div class="overflow-x-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Roles Management</h1>
        <a href="{{ route('admin.roles.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-semibold">
            + Add Role
        </a>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($roles as $role)
                <tr>
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-semibold">{{ $role->name }}</td>
                    {{-- <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $role->permissions->pluck('name')->join(', ') }}
                    </td> --}}
<td class="px-6 py-4 text-sm text-gray-600">
    @php
        $allPermissionsCount = \Spatie\Permission\Models\Permission::count();
        $rolePermissionsCount = $role->permissions->count();

        // Grouped permissions
        $grouped = $role->permissions->groupBy('group_name');
    @endphp

    @if($rolePermissionsCount === $allPermissionsCount)
        <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
            All Permissions
        </span>
    @else
        @foreach($grouped as $group => $perms)
            @php
                $groupTotal = \Spatie\Permission\Models\Permission::where('group_name', $group)->count();
            @endphp

            @if($perms->count() === $groupTotal)
                <span class="inline-block bg-green-100 text-blue-800 text-xs font-medium mr-1 mb-1 px-2.5 py-0.5 rounded-full">
                    {{ ucfirst($group) }} All
                </span>
            @else
                @foreach($perms as $permission)
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium mr-1 mb-1 px-2.5 py-0.5 rounded-full">
                        {{ $permission->name }}
                    </span>
                @endforeach
            @endif
        @endforeach
    @endif
</td>


                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Edit</a>
                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">No roles found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- pagination appear --}}
    {{-- <div class="mt-4">
        {{ $projects->links() }}
    </div> --}}
</div>
@endsection

