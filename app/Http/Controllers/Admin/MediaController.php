<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function __invoke(Media $media)
    {
        Storage::disk('public')->delete($media->file_path);
        $media->delete();

        return back()->with('success', 'Media deleted.');
    }

        public function setCover(Media $media)
    {
        $model = $media->mediable; // Get the related Project/Story/etc.

        // Reset all other media for this model
        $model->media()->update(['is_cover' => false]);

        // Set this media as cover
        $media->update(['is_cover' => true]);

        return back()->with('success', 'Cover image updated.');
    }
}
