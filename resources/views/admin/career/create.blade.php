@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Create New Vacancy</h1>
    <form action="{{ route('admin.career.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-bold">Category</label>
                <select name="category" class="w-full border p-2 rounded" id="category_selector">
                    <option value="job">Professional Job</option>
                    <option value="internship">Internship</option>
                </select>
            </div>
            <div>
                <label class="block font-bold">Location</label>
                <input type="text" name="location" placeholder="e.g. Dhaka, Remote" class="w-full border p-2 rounded">
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div id="job_type_div">
                <label class="block font-bold">Job Type</label>
                <select name="type" class="w-full border p-2 rounded">
                    <option value="full-time">Full-time</option>
                    <option value="part-time">Part-time</option>
                    <option value="contract">Contract</option>
                </select>
            </div>
            <div id="intern_duration_div" class="hidden">
                <label class="block font-bold">Duration</label>
                <input type="text" name="duration" placeholder="e.g. 6 Months" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-bold">Deadline</label>
                <input type="date" name="deadline" class="w-full border p-2 rounded">
            </div>
        </div>

        <div class="mb-4"><label class="block font-bold">Description</label><textarea name="description" class="summernote"></textarea></div>
        <div class="mb-4"><label class="block font-bold">Requirements</label><textarea name="requirements" class="summernote"></textarea></div>
        <div class="mb-4"><label class="block font-bold">Benefits</label><textarea name="benefits" class="summernote"></textarea></div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Save Vacancy</button>
    </form>
</div>

<script>
    document.getElementById('category_selector').addEventListener('change', function() {
        document.getElementById('job_type_div').classList.toggle('hidden', this.value !== 'job');
        document.getElementById('intern_duration_div').classList.toggle('hidden', this.value !== 'internship');
    });
</script>
@include('admin.career.partials.summernote')
@endsection
