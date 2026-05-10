<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanySectionController extends Controller
{
    public function index(Request $request)
    {
        $query = CompanySection::orderBy('sort_order');

        if ($request->filled('section')) {
            $query->where('section', $request->section);
        }

        $sections = $query->get();
        $sectionNames = CompanySection::distinct()->pluck('section');

        return view('admin.companyMessage.index', compact('sections', 'sectionNames'));
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

    // Use related section name (e.g., if type is ceo/advisor use 'messages', otherwise use type)
    if (in_array($data['type'], ['ceo', 'advisor'])) {
        $data['section'] = 'messages';
    } else {
        $data['section'] = $data['type'];
    }

    // AUTO sort order (last + 1)
    $data['sort_order'] = CompanySection::where('section', $data['section'])
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

    // Use related section name
    if (in_array($data['type'], ['ceo', 'advisor'])) {
        $data['section'] = 'messages';
    } else {
        $data['section'] = $data['type'];
    }

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
