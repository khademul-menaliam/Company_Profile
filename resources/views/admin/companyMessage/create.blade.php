@extends('admin.layouts.app')
@section('title', 'Add Company Section')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-2xl font-bold mb-6">Add Company Section</h1>

    <form action="{{ route('admin.company-sections.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow space-y-6">
        @csrf

        {{-- SECTION (always message) --}}
        <input type="hidden" name="section" value="message">

        {{-- Title --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Title</label>
            <input name="title"
                   placeholder="Message from Our Advisor"
                   class="w-full border p-2 rounded">
        </div>

        {{-- Full Name --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Full Name</label>
            <input name="subtitle"
                   placeholder="Full Name"
                   class="w-full border p-2 rounded">
        </div>

        {{-- Type --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Select Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="">Select Type</option>
                <option value="ceo">CEO Message</option>
                <option value="advisor">Advisor Message</option>
                <option value="history">Company History</option>
                <option value="about">About Us</option>
                <option value="philosophy">Our Philosophy</option>
                <option value="strengths">Our Strengths</option>
            </select>
        </div>

        {{-- Full Message (FULL ROW) --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Full Message</label>
            <textarea name="content" class="summernote w-full"></textarea>
        </div>

        {{-- Image --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Image</label>
            <input type="file"
                   name="image"
                   class="w-full border p-2 rounded">
        </div>

        {{-- Status (FULL ROW) --}}
        <div class="w-full">
            <label class="block font-medium mb-1">Status</label>
            <select name="status"
                    class="w-full border p-2 rounded">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        {{-- Submit --}}
        <div class="pt-4">
            <button class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
