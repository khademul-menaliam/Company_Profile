<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    // List all partners
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    // Show create form
    public function create()
    {
        return view('admin.partners.create');
    }

    // Store new partner
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'email' => 'nullable|email|max:255',
            'website_url' => 'nullable|url|max:255',
            'phone' => 'nullable|string|max:50',
            'logo' => 'nullable|image|max:20048', // optional, max 2MB
        ]);

        // Store partner logo on public disk
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partners', 'public');
        }

        Partner::create([
            'name' => $request->name,
            'description' => $request->description,
            'website_url' => $request->website_url,
            'email' => $request->email,
            'phone' => $request->phone,
            'logo' => $logoPath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    // Show a single partner
    public function show(Partner $partner)
    {
        return view('admin.partners.view', compact('partner'));
    }

    // Show edit form
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    // Update a partner
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'email' => 'nullable|email|max:255',
            'website_url' => 'nullable|url|max:255',
            'phone' => 'nullable|string|max:50',
            'logo' => 'nullable|image|max:20048',
        ]);

        // Update logo if a new one is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                Storage::disk('public')->delete($partner->logo);
            }
            $partner->logo = $request->file('logo')->store('partners', 'public');
        }

        // Update other fields
        $partner->update([
            'name' => $request->name,
            'description' => $request->description,
            'website_url' => $request->website_url,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        $partner->save();

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    // Delete a partner
    public function destroy(Partner $partner)
    {
        // Delete logo file if exists
        if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
