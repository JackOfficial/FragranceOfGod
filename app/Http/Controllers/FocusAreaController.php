<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FocusedArea;

class FocusAreaController extends Controller
{
    /**
     * Display all published focus areas
     */
    public function index()
    {
        
        // Fetch all published focus areas from DB
        $focusAreas = FocusedArea::where('is_published', 1)->latest()->get();

        return view('focus-areas.index', compact('focusAreas'));
    }

    /**
     * Display a single focus area
     */
    public function show($slug)
    {
        // Fetch single published focus area by slug
        $focusArea = FocusedArea::where('slug', $slug)
                        ->where('is_published', 1)
                        ->first();

        // Abort if not found
        if (!$focusArea) {
            abort(404, 'Focus Area not found.');
        }

        return view('focus-areas.show', compact('focusArea'));
    }
}
