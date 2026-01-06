<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Projects index page
    public function index()
    {
        // Fetch projects with media
        $projects = Project::with('media')->latest()->paginate(9);

        return view('projects.index', compact('projects'));
    }

    // Single project page
    public function show($slug)
    {
        $project = Project::with('media')->where('slug', $slug)->firstOrFail();

        // Get related projects (excluding this one)
        $relatedProjects = Project::with('media')
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
