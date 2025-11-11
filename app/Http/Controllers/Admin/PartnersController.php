<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class PartnersController extends Controller
{

    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }


    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'website']);

        // upload logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/clients'), $filename);
            $data['logo'] = $filename;
        }
    //     if ($request->hasFile('logo')) {
    //     $image = $request->file('logo');

    //     // Destination folder
    //     $destinationPath = public_path('images'); // public/services

    //     // Create folder if it doesn't exist
    //     if (!file_exists($destinationPath)) {
    //         mkdir($destinationPath, 0755, true);
    //     }

    //     // Generate unique filename
    //     $fileName = time() . '_' . $image->getClientOriginalName();
    //     // OR: $fileName = uniqid() . '_' . $image->getClientOriginalName();

    //     // Move file to public/services
    //     $image->move($destinationPath, $fileName);

    //     // Save relative path in DB
    //     $data['image'] = 'images/' . $fileName;
    // }

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client added successfully!');

    }


    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.view', compact('client'));
    }

    public function edit( $id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request,  $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'website']);

        if ($request->hasFile('logo')) {
            if ($client->logo && file_exists(public_path('uploads/clients/' . $client->logo))) {
                unlink(public_path('uploads/clients/' . $client->logo));
            }
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/clients'), $filename);
            $data['logo'] = $filename;
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully!');

    }

    public function destroy($id)
    {
         $client = Client::findOrFail($id);
        if ($client->logo && file_exists(public_path('uploads/clients/' . $client->logo))) {
            unlink(public_path('uploads/clients/' . $client->logo));
        }
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully!');

    }
}
