<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Media;
use Illuminate\Http\Request;
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
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string|max:500',
            'description' => 'nullable|string',
            'images.*' => 'image',
            'documents.*' => 'file',
        ]);

        $project = Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'is_published' => $request->is_published,
        ]);

        /* Images */
        if ($request->hasFile('images')) {
            foreach ($request->images as $index => $image) {
                $path = $image->store('projects', 'public');

                Media::create([
                    'mediable_id' => $project->id,
                    'mediable_type' => Project::class,
                    'file_path' => $path,
                    'file_type' => 'image',
                    'is_cover' => $index === 0, // first image = cover
                ]);
            }
        }

        /* Documents */
        if ($request->hasFile('documents')) {
            foreach ($request->documents as $doc) {
                $path = $doc->store('projects/docs', 'public');

                Media::create([
                    'mediable_id' => $project->id,
                    'mediable_type' => Project::class,
                    'file_path' => $path,
                    'file_type' => 'document',
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'is_published' => $request->is_published,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        return back()->with('success', 'Project deleted.');
    }
}
