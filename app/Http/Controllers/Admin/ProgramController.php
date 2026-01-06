<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\FocusedArea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of programs
     */
    public function index()
    {
        $programs = Program::latest()->paginate(15);
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new program
     */
    public function create()
    {
        $focusAreas = FocusedArea::all();
        return view('admin.programs.create', compact('focusAreas'));
    }

    /**
     * Store a newly created program
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string|max:255',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'focus_areas'  => 'array', // optional
        ]);

        $data['slug'] = Str::slug($data['title']);

        $program = Program::create($data);

        if (!empty($data['focus_areas'])) {
            $program->focusAreas()->sync($data['focus_areas']);
        }

        return redirect()->route('admin.programs.index')
                         ->with('success', 'Program created successfully.');
    }

    /**
     * Show the form for editing a program
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $focusAreas = FocusedArea::all();

        return view('admin.programs.edit', compact('program', 'focusAreas'));
    }

    /**
     * Update a program
     */
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string|max:255',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'focus_areas'  => 'array', // optional
        ]);

        if ($program->title !== $data['title']) {
            $data['slug'] = Str::slug($data['title']);
        }

        $program->update($data);

        // Sync focus areas
        $program->focusAreas()->sync($data['focus_areas'] ?? []);

        return redirect()->route('admin.programs.index')
                         ->with('success', 'Program updated successfully.');
    }

    /**
     * Delete a program
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.programs.index')
                         ->with('success', 'Program deleted successfully.');
    }
}
