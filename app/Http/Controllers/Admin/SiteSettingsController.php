<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        // Validation rules based on type
        $rules = [
            'setting_key'  => 'required|string|max:255|unique:site_settings,setting_key',
            'setting_type' => 'required|in:text,image,file,url,boolean',
        ];

        // Dynamic validation for setting_value based on type
        switch ($request->setting_type) {
            case 'text':
                $rules['setting_value'] = 'required|string';
                break;

            case 'url':
                $rules['setting_value'] = 'required|url';
                break;

            case 'image':
                $rules['setting_value'] = 'required|image|max:2048'; // 2MB max
                break;

            case 'file':
                $rules['setting_value'] = 'required|mimes:pdf|max:10240'; // 10MB max
                break;

            case 'boolean':
                $rules['setting_value'] = 'required|boolean';
                break;
        }

        $validated = $request->validate($rules);

        // Handle image upload
        if ($request->setting_type === 'image' && $request->hasFile('setting_value')) {
            $path = $request->file('setting_value')
                            ->store('uploads/settings/images', 'public');
            $validated['setting_value'] = $path;
        }


        // Handle file upload
        if ($request->setting_type === 'file' && $request->hasFile('setting_value')) {
            $file = $request->file('setting_value');

            // Sanitize setting key (e.g. company_profile)
            $settingKey = Str::slug($request->setting_key, '_');

            // Build filename: AR-Engineering-company_profile.pdf
            $filename = 'AR-Engineering-' . $settingKey . '.' . $file->extension();

            // Ensure destination exists
            $destination = public_path('uploads/settings/files');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            // Move file
            $file->move($destination, $filename);

            // Save relative public path
            $validated['setting_value'] = 'uploads/settings/files/' . $filename;
        }



        // Save setting
        SiteSetting::create($validated);

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Setting created successfully.');
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
        // Find the setting
        $setting = SiteSetting::findOrFail($id);

        // Delete associated file if it exists
        if ($setting->setting_type === 'image' || $setting->setting_type === 'file') {
            if ($setting->setting_value && Storage::disk('public')->exists($setting->setting_value)) {
                Storage::disk('public')->delete($setting->setting_value);
            }
        }

        // Delete the database record
        $setting->delete();

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully.');
    }

}
