<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanySectionController extends Controller
{
    public function index()
    {
        $sections = CompanySection::orderBy('sort_order')->get();
        return view('admin.companyMessage.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.companyMessage.create');
    }

public function store(Request $request)
{
    $data = $request->validate([
        'title'    => 'nullable|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'type'     => 'required|string|max:255',
        'content'  => 'nullable|string',
        'image'    => 'nullable|image|max:2048',
        'status'   => 'required|boolean',
    ]);

    // FORCE section = message
    $data['section'] = 'messages';

    // AUTO sort order (last + 1)
    $data['sort_order'] = CompanySection::where('section', 'message')
        ->max('sort_order') + 1;

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')
            ->store('company-sections', 'public');
    }

    CompanySection::create($data);

    return redirect()
        ->route('admin.company-sections.index')
        ->with('success', 'Message saved successfully');
}

public function edit(CompanySection $companySection)
{
    return view('admin.companyMessage.edit', compact('companySection'));
}

public function update(Request $request, CompanySection $companySection)
{
    $data = $request->validate([
        'title'    => 'nullable|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'type'     => 'required|string|max:255',
        'content'  => 'nullable|string',
        'image'    => 'nullable|image|max:2048',
        'status'   => 'required|boolean',
    ]);

    // section always message
    $data['section'] = 'messages';

    if ($request->hasFile('image')) {
        // delete old image
        if ($companySection->image) {
            Storage::disk('public')->delete($companySection->image);
        }

        $data['image'] = $request->file('image')
            ->store('company-sections', 'public');
    }

    $companySection->update($data);

    return redirect()
        ->route('admin.company-sections.index')
        ->with('success', 'Section updated successfully');
}


    public function destroy(CompanySection $company_section)
    {
        if ($company_section->image) {
            Storage::disk('public')->delete($company_section->image);
        }

        $company_section->delete();

        return redirect()
            ->route('admin.company-sections.index')
            ->with('success', 'Section deleted successfully');
    }
}
