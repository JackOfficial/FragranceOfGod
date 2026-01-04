<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Traits\HasSlug;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    use HasSlug;

    /**
     * Display a listing of events.
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show form to create a new event.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created event.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $event = Event::create([
            'title'        => $data['title'],
            'slug'         => $this->generateUniqueSlug($data['title'], Event::class),
            'description'  => $data['description'],
            'location'     => $data['location'],
            'event_date'   => $data['event_date'],
            'is_published' => $request->boolean('is_published'),
        ]);

        $this->handleMediaUploads($request, $event);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Show the form for editing an event.
     */
    public function edit(Event $event)
    {
        $event->load('media');
        return view('admin.events.edit', compact('event'));
    }

    public function show(Event $event)
    {
    // Load related media (images & documents)
    $event->load('media');

    return view('admin.events.show', compact('event'));
    }

    /**
     * Update an existing event.
     */
    public function update(Request $request, Event $event)
    {
        $data = $this->validateData($request);

        $event->update([
            'title'        => $data['title'],
            'slug'         => $this->generateUniqueSlug($data['title'], Event::class, $event->id),
            'description'  => $data['description'],
            'location'     => $data['location'],
            'event_date'   => $data['event_date'],
            'is_published' => $request->boolean('is_published'),
        ]);

        $this->handleMediaUploads($request, $event);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Delete an event.
     */
    public function destroy(Event $event)
    {
        // Delete associated media
        $event->media->each(function ($media) {
            Storage::disk('public')->delete($media->file_path);
            $media->delete();
        });

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }

    /**
     * Validate request data.
     */
    private function validateData(Request $request): array
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'location'    => 'required|string|max:255',
            'event_date'  => 'required|date',
            'images.*'    => 'nullable|image|max:2048',
            'documents.*' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'is_published'=> 'nullable|boolean',
        ]);
    }

    /**
     * Handle media uploads (images/documents).
     */
    private function handleMediaUploads(Request $request, Event $event)
    {
        collect(['images' => 'image', 'documents' => 'document'])->each(function ($type, $key) use ($request, $event) {
            if ($request->hasFile($key)) {
                foreach ($request->file($key) as $file) {
                    $path = $file->store("events/{$key}", 'public');
                    $event->media()->create([
                        'file_path' => $path,
                        'file_type' => $type,
                        'mime_type' => $file->getClientMimeType(),
                    ]);
                }
            }
        });
    }
}
