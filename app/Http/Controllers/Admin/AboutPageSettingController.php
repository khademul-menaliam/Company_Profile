<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageSettingController extends Controller
{
    public function index()
    {
        $aboutUs = CompanySection::where('section', 'about_page')->where('type', 'about_us')->first();
        $coreValues = CompanySection::where('section', 'about_page')->where('type', 'core_values')->first();

        return view('admin.companyMessage.about_settings', compact('aboutUs', 'coreValues'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_title' => 'nullable|string|max:255',
            'about_content' => 'nullable|string',
            'about_image' => 'nullable|image|max:2048',

            'core_values_title' => 'nullable|string|max:255',
            'core_values_content' => 'nullable|string',
            'core_values_image' => 'nullable|image|max:2048',
        ]);

        $this->updateSection('about_us', 'about_page', $request, 'about');
        $this->updateSection('core_values', 'about_page', $request, 'core_values');

        return redirect()->back()->with('success', 'About Page Details updated successfully.');
    }

    private function updateSection($type, $section, Request $request, $prefix)
    {
        $record = CompanySection::firstOrNew(['type' => $type, 'section' => $section]);

        $record->title = $request->input("{$prefix}_title");
        $record->content = $request->input("{$prefix}_content");
        $record->status = true;

        if ($request->hasFile("{$prefix}_image")) {
            if ($record->image && Storage::disk('public')->exists($record->image)) {
                Storage::disk('public')->delete($record->image);
            }
            $record->image = $request->file("{$prefix}_image")->store('company-sections', 'public');
        }

        $record->save();
    }
}
