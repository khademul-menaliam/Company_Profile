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
        $qualityPolicy = CompanySection::where('section', 'about_page')->where('type', 'quality_policy')->first();
        $vision = CompanySection::where('section', 'about_page')->where('type', 'vision')->first();
        $mission = CompanySection::where('section', 'about_page')->where('type', 'mission')->first();
        $philosophy = CompanySection::where('section', 'about_page')->where('type', 'philosophy')->first();

        return view('admin.companyMessage.about_settings', compact('aboutUs', 'coreValues', 'qualityPolicy', 'vision', 'mission', 'philosophy'));
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

            'quality_policy_title' => 'nullable|string|max:255',
            'quality_policy_content' => 'nullable|string',

            'vision_title' => 'nullable|string|max:255',
            'vision_content' => 'nullable|string',

            'mission_title' => 'nullable|string|max:255',
            'mission_content' => 'nullable|string',

            'philosophy_title' => 'nullable|string|max:255',
            'philosophy_subtitle' => 'nullable|string|max:255',
            'philosophy_content' => 'nullable|string',
        ]);

        $this->updateSection('about_us', 'about_page', $request, 'about');
        $this->updateSection('core_values', 'about_page', $request, 'core_values');
        $this->updateSection('quality_policy', 'about_page', $request, 'quality_policy');
        $this->updateSection('vision', 'about_page', $request, 'vision');
        $this->updateSection('mission', 'about_page', $request, 'mission');
        
        // For philosophy, we also need subtitle, but `updateSection` helper doesn't support subtitle by default. 
        // We'll update philosophy manually or adjust updateSection if needed. Let's adjust updateSection or do it manually.
        $this->updateSection('philosophy', 'about_page', $request, 'philosophy');
        $philosophyRecord = CompanySection::where('type', 'philosophy')->where('section', 'about_page')->first();
        if($philosophyRecord) {
            $philosophyRecord->subtitle = $request->input('philosophy_subtitle');
            $philosophyRecord->save();
        }

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
