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
        $projects = Project::with('client')->orderByDesc('published_at')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function show( $slug)
    {
        $project = Project::with(['gallery','client'])->where('slug',$slug)->firstOrFail();

        return view('admin.projects.view', compact('project'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('admin.projects.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'objectives' => 'nullable|string',
            'solution' => 'nullable|string',
            'technical_details' => 'nullable|string',
            'results' => 'nullable|string',
            'testimonial' => 'nullable|string',
            'client_id' => 'nullable|exists:clients,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20048',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Generate slug
        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Upload main image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project_image', 'public');
        }

        // Create project
        $project = Project::create([
            'title' => $request->title,
            'slug' => $slug,
            'location' => $request->location,
            'type' => $request->type,
            'timeline' => $request->timeline,
            'description' => $request->description,
            'objectives' => $request->objectives,
            'solution' => $request->solution,
            'technical_details' => $request->technical_details,
            'results' => $request->results,
            'testimonial' => $request->testimonial,
            'client_id' => $request->client_id,
            'image' => $imagePath,
            'status' => true,
            'published_at' => now(),
        ]);

        // Upload gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $path = $galleryImage->store('projects_gallery', 'public');
                $project->gallery()->create(['image' => $path]);
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

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'objectives' => 'nullable|string',
            'solution' => 'nullable|string',
            'technical_details' => 'nullable|string',
            'results' => 'nullable|string',
            'testimonial' => 'nullable|string',
            'client_id' => 'nullable|exists:clients,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20048',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
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

        // Upload main image
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
            'location' => $request->location,
            'type' => $request->type,
            'timeline' => $request->timeline,
            'description' => $request->description,
            'objectives' => $request->objectives,
            'solution' => $request->solution,
            'technical_details' => $request->technical_details,
            'results' => $request->results,
            'testimonial' => $request->testimonial,
            'client_id' => $request->client_id,
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

        // Add new gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $path = $galleryImage->store('projects_gallery', 'public');
                $project->gallery()->create(['image' => $path]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        // Delete main image
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        // Delete gallery images
        foreach ($project->gallery as $img) {
            if (Storage::disk('public')->exists($img->image)) {
                Storage::disk('public')->delete($img->image);
            }
            $img->delete();
        }

        // Delete project
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project and all associated images deleted successfully!');
    }
}
