<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'short_desc'   => 'required|string|max:500',
            'description'  => 'nullable|string',
            'is_published' => 'required|boolean',
            'images.*'     => 'image|max:5120',
            'documents.*'  => 'file|max:10240',
        ]);

        $project = Project::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'short_desc'   => $request->short_desc,
            'description'  => $request->description,
            'is_published' => $request->is_published,
        ]);

        /* ================= IMAGES ================= */
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $path = $image->store('projects', 'public');

                $project->media()->create([
                    'file_path' => $path,
                    'file_type' => 'image',
                    'mime_type' => $image->getMimeType(),
                    'title'     => $project->title,
                ]);
            }
        }

        /* ================= DOCUMENTS ================= */
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $doc) {

                $path = $doc->store('projects/docs', 'public');

                $project->media()->create([
                    'file_path' => $path,
                    'file_type' => 'document',
                    'mime_type' => $doc->getMimeType(),
                    'title'     => $project->title,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Project::with('media')->findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::with('media')->findOrFail($id);

        $request->validate([
            'title'        => 'required|string|max:255',
            'short_desc'   => 'required|string|max:500',
            'description'  => 'nullable|string',
            'is_published' => 'required|boolean',
            'images.*'     => 'image|max:5120',
            'documents.*'  => 'file|max:10240',
        ]);

        $project->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'short_desc'   => $request->short_desc,
            'description'  => $request->description,
            'is_published' => $request->is_published,
        ]);

        /* ================= ADD NEW IMAGES ================= */
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $path = $image->store('projects', 'public');

                $project->media()->create([
                    'file_path' => $path,
                    'file_type' => 'image',
                    'mime_type' => $image->getMimeType(),
                    'title'     => $project->title,
                ]);
            }
        }

        /* ================= ADD NEW DOCUMENTS ================= */
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $doc) {

                $path = $doc->store('projects/docs', 'public');

                $project->media()->create([
                    'file_path' => $path,
                    'file_type' => 'document',
                    'mime_type' => $doc->getMimeType(),
                    'title'     => $project->title,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::with('media')->findOrFail($id);

        /* Delete files from storage */
        foreach ($project->media as $media) {
            Storage::disk('public')->delete($media->file_path);
            $media->delete();
        }

        $project->delete();

        return back()->with('success', 'Project deleted successfully.');
    }
}
