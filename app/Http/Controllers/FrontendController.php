<?php

namespace App\Http\Controllers;

use App\Models\CareerInternship;
use App\Models\CareerJob;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function show($type, $slug)
    {
        $model = ($type === 'job') ? new CareerJob() : new \App\Models\CareerInternship();
        $item = $model->where('slug', $slug)->firstOrFail();

        return view('careers.view', compact('item', 'type'));
    }

    public function submitApplication(Request $request, $type, $id)
    {
// 1. Find the item first to check the deadline
    $model = ($type === 'job') ? new CareerJob() : new CareerInternship();
    $item = $model->findOrFail($id);

    // 2. Check if deadline exists and if it has passed
    if ($item->deadline && \Carbon\Carbon::parse($item->deadline)->isPast()) {
        return back()->with('error', 'Sorry, the deadline for this position has passed.');
    }

    // 3. Proceed with existing validation and save logic...
    $validated = $request->validate([
        'applicant_name' => 'required|string|max:255',
        'email'          => 'required|email|max:255',
        'phone'          => 'required|string|max:20',
        'resume'         => 'required|mimes:pdf,doc,docx|max:2048',
        'cover_letter'   => 'nullable|string',
    ]);
        // Handle File Upload
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validated['resume'] = $path;
        }

        // Link to the correct model
        if ($type === 'job') {
            $validated['job_id'] = $id;
        } else {
            $validated['intern_id'] = $id;
        }

        \App\Models\CareerApplication::create($validated);

        return back()->with('success', 'Your application has been submitted successfully!');
    }


    public function site_map()
    {
        return view('site_map');
    }

}
