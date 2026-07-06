<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::latest()->get();
        return view('admin.gallery.index', compact('galleryItems'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'nullable|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,webm,ogg,avi|max:200480',
            'vimeo_urls' => 'nullable|string',
            'title'   => 'nullable|string|max:255',
            'status'  => 'required|boolean',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('gallery'), $filename);

                GalleryItem::create([
                    'image'  => 'gallery/' . $filename,
                    'title'  => $request->title,
                    'status' => $request->status,
                ]);
            }
        }

        if ($request->filled('vimeo_urls')) {
            $urls = array_filter(array_map('trim', explode("\n", $request->vimeo_urls)));
            foreach ($urls as $url) {
                // Convert standard Vimeo link to player embed link if needed
                if (preg_match('/vimeo\.com\/(?:video\/)?(\d+)/', $url, $matches)) {
                    $url = 'https://player.vimeo.com/video/' . $matches[1];
                }

                GalleryItem::create([
                    'image'  => $url,
                    'title'  => $request->title,
                    'status' => $request->status,
                ]);
            }
        }

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery items added successfully');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $request->validate([
            'image'  => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,webm,ogg,avi|max:20480',
            'vimeo_url' => 'nullable|url',
            'title'  => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($gallery->image) && !str_contains($gallery->image, 'vimeo.com')) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->image = $request->file('image')->store('gallery', 'public');
        } elseif ($request->filled('vimeo_url')) {
            if (Storage::disk('public')->exists($gallery->image) && !str_contains($gallery->image, 'vimeo.com')) {
                Storage::disk('public')->delete($gallery->image);
            }
            
            $url = $request->vimeo_url;
            if (preg_match('/vimeo\.com\/(?:video\/)?(\d+)/', $url, $matches)) {
                $url = 'https://player.vimeo.com/video/' . $matches[1];
            }
            $gallery->image = $url;
        }

        $gallery->title  = $request->title;
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery item updated');
    }

    public function destroy(GalleryItem $gallery)
    {
        if (Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return back()->with('success', 'Gallery item deleted');
    }
}
