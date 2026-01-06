<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display all programs
     */
    public function index()
    {
        // Fetch all programs, paginated, latest first
        $programs = Program::latest()->paginate(15);

        return view('programs.index', compact('programs'));
    }

    /**
     * Display a single program
     */
    public function show($id)
    {
        // Find program by ID (no model binding)
        $program = Program::with(['focusAreas', 'images', 'documents'])->find($id);

        if (!$program) {
            abort(404);
        }

        // Fetch related programs (exclude current)
        $relatedPrograms = Program::where('id', '!=', $program->id)
            ->latest()
            ->take(3)
            ->get();

        return view('programs.show', compact('program', 'relatedPrograms'));
    }
}
