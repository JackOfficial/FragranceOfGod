<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

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
                               ->where('is_featured', true) // if you add this column
                               ->orderBy('event_date', 'asc')
                               ->take(3)
                               ->get();

        return view('index', compact('events', 'featuredEvents'));
    }

    /**
     * Home method if needed separately.
     */
    public function home()
    {
        return redirect()->route('index'); // redirect to index if you want one homepage
    }
}
