<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    // Display the Our Stories page
    public function index()
    {
        $stories = Story::with(['media', 'author'])
        ->where('is_published', true)
        ->latest()
        ->paginate(9);

        return view('stories.index', compact('stories'));
    }

    // Optional: show single story details
public function show($slug)
{
    $story = Story::with(['media', 'author'])
        ->where('slug', $slug)
        ->where('is_published', true)
        ->firstOrFail();

    $relatedStories = Story::with('media')
        ->where('id', '!=', $story->id)
        ->where('is_published', true)
        ->latest()
        ->take(2)
        ->get();

    $otherStories = Story::where('id', '!=', $story->id)
        ->where('is_published', true)
        ->latest()
        ->take(5)
        ->get();

    return view('stories.show', compact(
        'story',
        'relatedStories',
        'otherStories'
    ));
}
}
