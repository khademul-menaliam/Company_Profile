<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Client;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->where('status', true)->orderByDesc('published_at')->get();
        return view('admin.projects.index', compact('projects'));
        // admin.services.index
    }

    public function show($slug)
    {
        $project = Project::with(['gallery','client'])->where('slug',$slug)->firstOrFail();
        return view('admin.projects.view', compact('project'));
    }
    public function create()
    {
         $clients = Client::all();
        return view('admin.projects.create', compact('clients'));;
    }

    public function store(Request $request)
    {
        // ✅ Validate inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'nullable|string|max:255|unique:projects,slug',
            'short_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // main image
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3048', // gallery
        ]);

        // ✅ Generate slug if empty
        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // ✅ Upload main image
        $mainImagePath = null;
        if ($request->hasFile('image')) {
            $mainImagePath = $request->file('image')->store('project_image', 'public');
        }

        // ✅ Create project
        $project = Project::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->short_description,
            'image' => $mainImagePath, // main image
        ]);

        // ✅ Upload gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $path = $galleryImage->store('projects_gallery', 'public');

                // Insert into project_images table
                $project->gallery()->create([
                    'image' => $path
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
                        ->with('success', 'Project created successfully!');
    }


    public function edit(Project $project)
    {
        $clients = Client::all();
        return view('admin.projects.edit', compact('project','clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'short_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // main image
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3048', // new gallery images
            'delete_gallery' => 'nullable|array',
            'delete_gallery.*' => 'integer|exists:project_images,id',
        ]);

        // Generate slug
        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Main image upload
        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $imagePath = $request->file('image')->store('project_image', 'public');
        } else {
            $imagePath = $project->image;
        }

        // Update project
        $project->update([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->short_description,
            'image' => $imagePath,
        ]);

        // Delete selected gallery images
        if ($request->filled('delete_gallery')) {
            $imagesToDelete = ProjectImage::whereIn('id', $request->delete_gallery)->get();
            foreach ($imagesToDelete as $img) {
                if (Storage::disk('public')->exists($img->image)) {
                    Storage::disk('public')->delete($img->image);
                }
                $img->delete();
            }
        }


        // ✅ Add new gallery images (keep old ones)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $path = $galleryImage->store('projects_gallery', 'public');
                $project->gallery()->create([
                    'image' => $path
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
                        ->with('success', 'Project updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // ✅ Delete main image if exists
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        // ✅ Delete gallery images if exist
        foreach ($project->gallery as $img) {
            if (Storage::disk('public')->exists($img->image)) {
                Storage::disk('public')->delete($img->image);
            }
            $img->delete(); // delete record from project_images table
        }

        // ✅ Delete project record
        $project->delete();

        return redirect()->route('admin.projects.index')
                        ->with('success', 'Project and all associated images deleted successfully!');
    }

}
