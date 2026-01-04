<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    /**
     * Display a listing of stories.
     */
    public function index()
    {
        $stories = Story::with('author', 'media')->latest()->paginate(10);
        return view('admin.stories.index', compact('stories'));
    }

    /**
     * Show the form to create a new story.
     */
    public function create()
    {
        return view('admin.stories.create');
    }

    /**
     * Store a newly created story.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $story = Story::create([
            'title'        => $data['title'],
            'slug'         => Str::slug($data['title']).'-'.uniqid(),
            'description'  => $data['description'],
            'author_id'    => Auth::id(), // assign logged-in user
            'is_published' => $request->boolean('is_published'),
        ]);

        $this->handleMediaUploads($request, $story);

        return redirect()->route('admin.stories.index')
            ->with('success', 'Story created successfully.');
    }

    /**
     * Show the form for editing a story.
     */
    public function edit(Story $story)
    {
        $story->load('media');
        return view('admin.stories.edit', compact('story'));
    }

    /**
     * Update an existing story.
     */
    public function update(Request $request, Story $story)
    {
        $data = $this->validateData($request);

        $story->update([
            'title'        => $data['title'],
            'slug'         => Str::slug($data['title']).'-'.uniqid(),
            'description'  => $data['description'],
            'is_published' => $request->boolean('is_published'),
        ]);

        $this->handleMediaUploads($request, $story);

        return redirect()->route('admin.stories.index')
            ->with('success', 'Story updated successfully.');
    }

    /**
     * Soft delete a story.
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('admin.stories.index')
            ->with('success', 'Story moved to trash.');
    }

    /**
     * Restore a soft-deleted story.
     */
    public function restore($id)
    {
        $story = Story::onlyTrashed()->findOrFail($id);
        $story->restore();
        return redirect()->route('admin.stories.index')
            ->with('success', 'Story restored successfully.');
    }

    /**
     * Permanently delete a story.
     */
    public function forceDelete($id)
    {
        $story = Story::onlyTrashed()->findOrFail($id);

        // Delete associated media
        $story->media->each(function ($media) {
            Storage::disk('public')->delete($media->file_path);
            $media->delete();
        });

        $story->forceDelete();

        return redirect()->route('admin.stories.index')
            ->with('success', 'Story permanently deleted.');
    }

    /**
     * Validate request data.
     */
    private function validateData(Request $request): array
    {
        return $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'images.*'     => 'nullable|image|max:2048',
            'documents.*'  => 'nullable|mimes:pdf,doc,docx|max:5120',
            'is_published' => 'nullable|boolean',
        ]);
    }

    /**
     * Handle media uploads (images/documents).
     */
    private function handleMediaUploads(Request $request, Story $story)
    {
        collect(['images' => 'image', 'documents' => 'document'])->each(function ($type, $key) use ($request, $story) {
            if ($request->hasFile($key)) {
                foreach ($request->file($key) as $file) {
                    $path = $file->store("stories/{$key}", 'public');
                    $story->media()->create([
                        'file_path' => $path,
                        'file_type' => $type,
                        'mime_type' => $file->getClientMimeType(),
                    ]);
                }
            }
        });
    }
}
