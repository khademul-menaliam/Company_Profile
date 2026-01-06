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
            'files.*' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,webm,ogg|max:200480',
            'title'   => 'nullable|string|max:255',
            'status'  => 'required|boolean',
        ]);

        foreach ($request->file('files') as $file) {

            $path = $file->store('gallery', 'public');

            GalleryItem::create([
                'image'  => $path,
                'title'  => $request->title,
                'status' => $request->status,
            ]);
        }

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery files uploaded successfully');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $request->validate([
            'image'  => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,webm,ogg|max:20480',
            'title'  => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {

            if (Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->image = $request->file('image')->store('gallery', 'public');
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
