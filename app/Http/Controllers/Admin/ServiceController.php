<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::where('status', true)->with(['children' => function($q) {
        $q->orderBy('sort_order', 'asc'); // or desc
    }])->whereNull('parent_id')->orderBy('sort_order','asc')->paginate(3);
        return view('admin.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('status', true)->firstOrFail();
        return view('admin.services.view', compact('service'));
    }

    public function create()
    {
        $parentServices = Service::whereNull('parent_id')->get();
        return view('admin.services.create', compact('parentServices'));

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|unique:services,slug',
            'short_description' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'parent_id' => 'nullable|integer|exists:services,id',
        ]);
        // dd($data);

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Destination folder
        $destinationPath = public_path('images'); // public/services

        // Create folder if it doesn't exist
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Generate unique filename
        $fileName = time() . '_' . $image->getClientOriginalName();
        // OR: $fileName = uniqid() . '_' . $image->getClientOriginalName();

        // Move file to public/services
        $image->move($destinationPath, $fileName);

        // Save relative path in DB
        $data['image'] = 'images/' . $fileName;
    }


        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success','Service created.');
    }


    public function edit(Service $service)
    {
        $parentServices = Service::whereNull('parent_id')->get();
        return view('admin.services.edit', compact('service','parentServices'));
    }


    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        // Validate input
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|unique:services,slug,' . $service->id,
            'short_description' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'parent_id' => 'nullable|integer|exists:services,id',
        ]);

        // Handle image upload (if a new one is uploaded)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/services', 'public');
            $data['image'] = 'storage/' . $path;
        }

        // If parent_id is empty, set it to null (for main services)
        if (empty($data['parent_id'])) {
            $data['parent_id'] = null;
        }

        // Prevent assigning itself as parent (to avoid loop)
        if ($data['parent_id'] == $service->id) {
            return redirect()->back()->with('error', 'A service cannot be its own parent.');
        }

        // Update service
        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Check if this service has any children
        if ($service->children()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete this service because it has sub-services under it.');
        }

        // Delete the image if it exists
        // if ($service->image && file_exists(public_path($service->image))) {
        //     unlink(public_path($service->image));
        // }

        // Delete the service
        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

}
