<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use App\Models\CareerJob;
use App\Models\CareerInternship;
use App\Models\CareerPage;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    private function getModel($type)
    {
        return match ($type) {
            'job'        => new CareerJob(),
            'internship' => new CareerInternship(),
            'page'       => new CareerPage(),
            default      => abort(404),
        };
    }

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
        $type = $request->input('category');
        $model = $this->getModel($type);

        $rules = [
            'title'        => 'required|string|max:255',
            'location'     => 'nullable|string',
            'description'  => 'required',
            'requirements' => 'nullable',
            'benefits'     => 'nullable',
            'deadline'     => 'nullable|date',
        ];

        if ($type === 'job') $rules['type'] = 'required|in:full-time,part-time,contract';
        if ($type === 'internship') $rules['duration'] = 'nullable|string';

        $validated = $request->validate($rules);
        $validated['slug'] = Str::slug($request->title) . '-' . time();

        $model->create($validated);
        return redirect()->route('admin.career.index')->with('success', 'Created successfully.');
    }

    public function edit($type, $id)
    {
        $item = $this->getModel($type)->findOrFail($id);
        return view('admin.career.edit', compact('item', 'type'));
    }

    public function update(Request $request, $type, $id)
    {
        $item = $this->getModel($type)->findOrFail($id);
        $rules = ['title' => 'required|string|max:255'];

        if ($type === 'page') {
            $rules += ['subtitle' => 'nullable|string', 'content' => 'required'];
        } else {
            $rules += [
                'location'     => 'nullable|string',
                'description'  => 'required',
                'requirements' => 'nullable',
                'benefits'     => 'nullable',
                'deadline'     => 'nullable|date',
                'status'       => 'required',
            ];
            if ($type === 'job') $rules['type'] = 'required|in:full-time,part-time,contract';
            if ($type === 'internship') $rules['duration'] = 'nullable|string';
        }

        $validated = $request->validate($rules);
        if ($type !== 'page' && $item->title !== $request->title) {
            $validated['slug'] = Str::slug($request->title) . '-' . time();
        }

        $item->update($validated);
        return redirect()->route('admin.career.index')->with('success', 'Updated successfully.');
    }

    public function destroy($type, $id)
    {
        $this->getModel($type)->findOrFail($id)->delete();
        return redirect()->route('admin.career.index')->with('success', 'Deleted successfully.');
    }

    public function viewApplications()
    {
    $applications = CareerApplication::with(['job', 'internship'])
                        ->latest()
                        ->get();

    return view('admin.career.application.index', compact('applications'));
    }


}
