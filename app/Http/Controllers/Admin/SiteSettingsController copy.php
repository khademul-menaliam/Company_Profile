<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    public function index()
    {
        // Fetch paginated site settings (you can adjust the pagination count)
        $settings = SiteSetting::paginate(10);

        return view('admin.siteSettings.index', compact('settings'));
    }
     public function create()
    {
        return view('admin.siteSettings.create');
    }

    // Store the newly created site setting
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'setting_key' => 'required|string|max:255|unique:site_settings,setting_key',
            'setting_type' => 'required|in:text,image,url,boolean',
            'setting_value' => 'required',
        ]);

        // Handle the image file if the setting type is 'image'
        if ($request->setting_type == 'image' && $request->hasFile('setting_value')) {
            // Store the image and get the file path
            $path = $request->file('setting_value')->store('public/uploads/settings');
            $validated['setting_value'] = $path;
        }

        // Create the new site setting
        SiteSetting::create($validated);

        return redirect()->route('admin.settings.index')->with('success', 'Setting created successfully.');
    }

    public function show($id)
    {
        $setting = SiteSetting::findOrFail($id);
        return view('admin.siteSettings.view', compact('setting'));
    }

    public function edit($id)
    {
        $setting = SiteSetting::findOrFail($id);
        return view('admin.siteSettings.edit', compact('setting'));
    }
        public function update(Request $request, $id)
    {
        // Find the setting
        $setting = SiteSetting::findOrFail($id);

        // Validate the incoming data
        $validated = $request->validate([
            'setting_key' => 'required|string|max:255|unique:site_settings,setting_key,' . $setting->id,
            'setting_type' => 'required|in:text,image,url,boolean',
            'setting_value' => 'required',
        ]);

        // Handle the image upload if the setting type is 'image'
        if ($request->setting_type == 'image' && $request->hasFile('setting_value')) {
            // Delete old image if exists
            if ($setting->setting_value) {
                Storage::delete($setting->setting_value);
            }

            // Store the new image
            $path = $request->file('setting_value')->store('public/uploads/settings');
            $validated['setting_value'] = $path;
        }

        // Update the setting
        $setting->update($validated);

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully.');
    }


    public function destroy($id)
    {
        $setting = SiteSetting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index')->with('success', 'Setting deleted successfully.');
    }
}
