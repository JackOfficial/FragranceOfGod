<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Show list of events: upcoming and past
     */
    public function index()
    {
        $today = Carbon::today();

        $upcomingEvents = Event::where('event_date', '>=', $today)
            ->orderBy('event_date', 'asc')
            ->get();

        $pastEvents = Event::where('event_date', '<', $today)
            ->orderBy('event_date', 'desc')
            ->get();

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    /**
     * Show a single event by slug
     */
    public function show($slug)
    {
        $event = Event::where('slug', $slug)
            ->with('media') // load related media (images/documents)
            ->firstOrFail();

        // Fetch related events: latest 5 events excluding current
        $relatedEvents = Event::where('id', '!=', $event->id)
            ->orderBy('event_date', 'desc')
            ->take(5)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
}
