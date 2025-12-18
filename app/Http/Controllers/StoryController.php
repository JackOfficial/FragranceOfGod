<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryController extends Controller
{
    // Display the Our Stories page
    public function index()
    {
        // Example: dynamic stories can come from a database later
        $stories = [
            [
                'title' => 'Empowering Girls Through Education',
                'desc' => 'Meet Aline, a young girl in Kigali whose life was transformed through education programs.',
                'img'  => 'story-1.jpg',
                'link' => '#'
            ],
            [
                'title' => 'Community Health Awareness',
                'desc' => 'Discover how our health initiatives improved access to care for rural communities.',
                'img'  => 'story-2.jpg',
                'link' => '#'
            ],
            [
                'title' => 'Restoring Family Dignity',
                'desc' => 'Read about a family in Musanze that received counseling and support to rebuild their lives.',
                'img'  => 'story-3.jpg',
                'link' => '#'
            ],
        ];

        return view('stories.index', compact('stories'));
    }

    // Optional: show single story details
   public function show($slug)
{
    // Example: fetch story dynamically by slug
    $story = [
        'title' => 'Empowering Girls Through Education',
        'desc' => 'Aline is a young girl in Kigali whose life was transformed through our education programs. She gained confidence, access to quality education, and mentorship that opened doors to new opportunities.',
        'img'  => 'story-1.jpg',
    ];

    $otherStories = [
        ['title'=>'Community Health Awareness','slug'=>'community-health-awareness','short_desc'=>'Health education and workshops in rural communities.'],
        ['title'=>'Restoring Family Dignity','slug'=>'restoring-family-dignity','short_desc'=>'Support for families to rebuild their lives and restore hope.'],
    ];

    return view('stories.show', compact('story', 'otherStories'));
}
}
