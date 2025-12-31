<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    // List all clients
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    // Show create form
    public function create()
    {
        return view('admin.clients.create');
    }

    // Store new client
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:20048',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'company']);

        // Store logo on public disk
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client added successfully!');
    }

    // Show a single client
    public function show(Client $client)
    {
        return view('admin.clients.view', compact('client'));
    }

    // Show edit form
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    // Update a client
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:20048',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'company']);

        // Replace logo if uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($client->logo && Storage::disk('public')->exists($client->logo)) {
                Storage::disk('public')->delete($client->logo);
            }
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully!');
    }

    // Delete a client
    public function destroy(Client $client)
    {
        // Delete logo if exists
        if ($client->logo && Storage::disk('public')->exists($client->logo)) {
            Storage::disk('public')->delete($client->logo);
        }

        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully!');
    }
}
