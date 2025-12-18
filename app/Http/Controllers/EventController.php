<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = [
            [
                'title' => 'Community Prayer Day',
                'desc' => 'Bringing hope and unity through prayer.',
                'location' => 'Kigali',
                'date' => 'December 2025',
                'slug' => 'community-prayer-day',
                'img' => 'event-1.jpg'
            ],
            [
                'title' => 'Youth Mentorship Camp',
                'desc' => 'Building faith-driven future leaders.',
                'location' => 'Huye',
                'date' => 'January 2026',
                'slug' => 'youth-mentorship-camp',
                'img' => 'event-2.jpg'
            ],
        ];

        $pastEvents = [
            [
                'title' => 'Family Restoration Workshop',
                'desc' => 'Healing families through love and guidance.',
                'location' => 'Musanze',
                'date' => 'July 2025',
                'slug' => 'family-restoration-workshop',
                'img' => 'event-3.jpg'
            ],
        ];

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function show($slug)
    {
        $event = [
            'title' => 'Community Prayer Day',
            'desc' => 'Full description of the event with details about activities, objectives, and impact.',
            'location' => 'Kigali',
            'date' => 'December 2025',
            'img' => 'event-1.jpg'
        ];

        $relatedEvents = [
            [
                'title' => 'Youth Mentorship Camp',
                'slug' => 'youth-mentorship-camp'
            ],
            [
                'title' => 'Family Restoration Workshop',
                'slug' => 'family-restoration-workshop'
            ]
        ];

        return view('events.show', compact('event', 'relatedEvents'));
    }
}
