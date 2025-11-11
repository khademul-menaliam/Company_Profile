<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Storage;


class ProjectImageController extends Controller
{

    public function destroy(ProjectImage $image)
    {
        // Delete file from storage
        if (Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        // Delete record from database
        $image->delete();

        return back()->with('success', 'Gallery image deleted successfully!');
    }

}
