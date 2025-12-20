<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            // Add validation rules for other fields like email, website, etc.
        ]);

        // Store partner logo if available
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/partners');
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

    // Other methods for show, edit, update, destroy...
}
