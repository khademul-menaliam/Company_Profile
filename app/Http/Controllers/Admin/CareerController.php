<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerJob;
use App\Models\CareerInternship;
use App\Models\CareerPage;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = CareerJob::latest()->get();
        $internships = CareerInternship::latest()->get();
        $whyJoinUs = CareerPage::where('slug', 'why-join-us')->first();
        return view('admin.career.index', compact('jobs', 'internships', 'whyJoinUs'));
    }

    public function create()
    {
        return view('admin.career.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:job,internship',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
        ]);

        if ($validated['type'] === 'job') {
            CareerJob::create($validated);
        } else {
            CareerInternship::create($validated);
        }

        return redirect()->route('admin.career.index')->with('success', 'Career item added successfully.');
    }

    public function edit($type, $id)
    {
        $model = $type === 'job' ? CareerJob::findOrFail($id) : CareerInternship::findOrFail($id);
        return view('admin.career.edit', compact('model', 'type'));
    }

    public function update(Request $request, $type, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
        ]);

        $model = $type === 'job' ? CareerJob::findOrFail($id) : CareerInternship::findOrFail($id);
        $model->update($validated);

        return redirect()->route('admin.career.index')->with('success', 'Career item updated successfully.');
    }

    public function destroy($type, $id)
    {
        $model = $type === 'job' ? CareerJob::findOrFail($id) : CareerInternship::findOrFail($id);
        $model->delete();

        return back()->with('success', 'Career item deleted.');
    }
}
