<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $aboutUs = CompanySection::where('type', 'about')->first();
        $ceoMessage = CompanySection::where('type', 'ceo')->first();
        $advisorMessage = CompanySection::where('type', 'advisor')->first();

        return view('admin.companyMessage.settings', compact('aboutUs', 'ceoMessage', 'advisorMessage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_title' => 'nullable|string|max:255',
            'about_content' => 'nullable|string',
            'about_image' => 'nullable|image|max:2048',

            'ceo_title' => 'nullable|string|max:255',
            'ceo_subtitle' => 'nullable|string|max:255',
            'ceo_name' => 'nullable|string|max:255',
            'ceo_content' => 'nullable|string',
            'ceo_image' => 'nullable|image|max:2048',

            'advisor_title' => 'nullable|string|max:255',
            'advisor_subtitle' => 'nullable|string|max:255',
            'advisor_name' => 'nullable|string|max:255',
            'advisor_content' => 'nullable|string',
            'advisor_image' => 'nullable|image|max:2048',
        ]);

        $this->updateSection('about', 'history', $request, 'about');
        $this->updateSection('ceo', 'messages', $request, 'ceo');
        $this->updateSection('advisor', 'messages', $request, 'advisor');

        return redirect()->back()->with('success', 'Home Page Details updated successfully.');
    }

    private function updateSection($type, $section, Request $request, $prefix)
    {
        $record = CompanySection::firstOrNew(['type' => $type, 'section' => $section]);

        $record->title = $request->input("{$prefix}_title");
        $record->content = $request->input("{$prefix}_content");
        $record->status = true;

        if ($prefix !== 'about') {
            $record->subtitle = $request->input("{$prefix}_subtitle");
            $record->name = $request->input("{$prefix}_name");
        }

        if ($request->hasFile("{$prefix}_image")) {
            if ($record->image && Storage::disk('public')->exists($record->image)) {
                Storage::disk('public')->delete($record->image);
            }
            $record->image = $request->file("{$prefix}_image")->store('company-sections', 'public');
        }

        $record->save();
    }
}
