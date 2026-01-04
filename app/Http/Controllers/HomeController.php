<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Story;

class HomeController extends Controller
{
    /**
     * Display the homepage with events.
     */
    public function index()
    {
        // Fetch published events, order by upcoming first
        $events = Event::where('is_published', true)
                        ->orderBy('event_date', 'asc')
                        ->take(6) // adjust number of events to show
                        ->get();

        // Optionally, fetch featured events for a slider/banner
        $featuredEvents = Event::where('is_published', true)
                               ->orderBy('event_date', 'asc')
                               ->take(3)
                               ->get();

        $stories = Story::with('media')
        ->where('is_published', true)
        ->latest()
        ->take(3) // show latest 3 stories
        ->get();

        return view('index', compact('events', 'featuredEvents', 'stories'));
    }

    /**
     * Home method if needed separately.
     */
    public function home()
    {
        return redirect()->route('index'); // redirect to index if you want one homepage
    }
}
