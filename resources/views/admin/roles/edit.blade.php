@extends('admin.layouts.app')
@section('title', 'Edit Role | Admin')

@section('content')
<div class="w-full">
    <!-- Top Bar -->
    <div class="bg-blue-600 text-white px-6 py-3 rounded-t-xl flex justify-between items-center">
        <h2 class="text-lg font-semibold">Edit Role: {{ $role->name }}</h2>
        <a href="{{ route('admin.roles.index') }}" class="text-white hover:text-gray-200 text-sm">Back</a>
    </div>

    <!-- Form Section -->
    <div class="bg-white shadow-lg rounded-b-xl p-8">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Role Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Role Name</label>
                <input type="text" name="name" id="name" placeholder="Enter role name"
                    value="{{ old('name', $role->name) }}"
                    class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2">
            </div>

            <!-- Permissions Group -->
            <div class="border border-gray-200 rounded-lg p-6 bg-gray-50">
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="checkAll" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="checkAll" class="ml-2 font-semibold text-gray-700">All Permission</label>
                </div>

                @php
                    $grouped = $permissions->groupBy('group_name');
                @endphp

                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($grouped as $group => $perms)
                        <div class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="font-semibold text-gray-800">{{ ucfirst($group) }}</h3>
                                <div class="space-x-2">
                                    <button type="button" class="text-xs bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium px-2 py-1 rounded select-group" data-group="{{ $group }}">Select All</button>
                                    <button type="button" class="text-xs bg-red-100 hover:bg-red-200 text-red-700 font-medium px-2 py-1 rounded unselect-group" data-group="{{ $group }}">Unselect</button>
                                </div>
                            </div>

                            <div class="space-y-2">
                                @foreach($perms as $permission)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 group-{{ $group }}"
                                            {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <span class="text-gray-700 text-sm">{{ $permission->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3 mt-8">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                    Update Role
                </button>
                <a href="{{ route('admin.roles.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-2 rounded-lg shadow inline-flex items-center justify-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Check All Script -->
<script>
    // Master check all
    const checkAll = document.getElementById('checkAll');
    const allCheckboxes = document.querySelectorAll('input[name="permissions[]"]');

    // Initialize master checkbox based on current selection
    function updateMasterCheckbox() {
        const total = allCheckboxes.length;
        const checked = document.querySelectorAll('input[name="permissions[]"]:checked').length;
        checkAll.checked = total === checked;
    }

    updateMasterCheckbox(); // run on page load

    // When master checkbox is toggled
    checkAll.addEventListener('change', function () {
        allCheckboxes.forEach(cb => cb.checked = this.checked);
    });

    // Group select all / unselect all
    document.querySelectorAll('.select-group').forEach(button => {
        button.addEventListener('click', function() {
            const group = this.getAttribute('data-group');
            document.querySelectorAll('.group-' + group).forEach(cb => cb.checked = true);
            updateMasterCheckbox();
        });
    });

    document.querySelectorAll('.unselect-group').forEach(button => {
        button.addEventListener('click', function() {
            const group = this.getAttribute('data-group');
            document.querySelectorAll('.group-' + group).forEach(cb => cb.checked = false);
            updateMasterCheckbox();
        });
    });

    // Update master checkbox when any individual checkbox changes
    allCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateMasterCheckbox);
    });
</script>

@endsection
