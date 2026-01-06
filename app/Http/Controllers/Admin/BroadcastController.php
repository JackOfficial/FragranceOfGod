<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Broadcast;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BroadcastController extends Controller
{
    /**
     * Display a listing of all broadcasts.
     */
    public function index()
    {
        $broadcasts = Broadcast::latest()->paginate(15);
        return view('admin.broadcasts.index', compact('broadcasts'));
    }

    /**
     * Show the form for creating a new broadcast.
     */
    public function create()
    {
        return view('admin.broadcasts.create');
    }

    /**
     * Store a newly created broadcast in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status'  => 'required|in:draft,sent',
        ]);

        $broadcast = Broadcast::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'status'  => $request->status,
            'sent_at' => $request->status === 'sent' ? now() : null,
        ]);

        // If the broadcast is sent immediately, send emails to all subscribers
        if ($request->status === 'sent') {
            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber) {
                Mail::raw($broadcast->message, function ($mail) use ($subscriber, $broadcast) {
                    $mail->to($subscriber->email)
                         ->subject($broadcast->subject);
                });
            }
        }

        return redirect()
            ->route('admin.broadcasts.index')
            ->with('success', 'Broadcast saved successfully.');
    }

    /**
     * Show the form for editing a broadcast.
     */
    public function edit(string $id)
    {
        $broadcast = Broadcast::findOrFail($id);
        return view('admin.broadcasts.edit', compact('broadcast'));
    }

    /**
     * Update the specified broadcast in storage.
     */
    public function update(Request $request, string $id)
    {
        $broadcast = Broadcast::findOrFail($id);

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status'  => 'required|in:draft,sent',
        ]);

        $broadcast->update([
            'subject' => $request->subject,
            'message' => $request->message,
            'status'  => $request->status,
            'sent_at' => $request->status === 'sent' ? now() : $broadcast->sent_at,
        ]);

        // If now set to "sent", send emails to all subscribers who haven’t received it yet
        if ($request->status === 'sent' && !$broadcast->sent_at) {
            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber) {
                Mail::raw($broadcast->message, function ($mail) use ($subscriber, $broadcast) {
                    $mail->to($subscriber->email)
                         ->subject($broadcast->subject);
                });
            }
            $broadcast->update(['sent_at' => now()]);
        }

        return redirect()
            ->route('admin.broadcasts.index')
            ->with('success', 'Broadcast updated successfully.');
    }

    /**
     * Remove a broadcast from storage.
     */
    public function destroy(string $id)
    {
        $broadcast = Broadcast::findOrFail($id);
        $broadcast->delete();

        return redirect()
            ->route('admin.broadcasts.index')
            ->with('success', 'Broadcast deleted successfully.');
    }

    /**
     * Optionally, view a broadcast.
     */
    public function show(string $id)
    {
        $broadcast = Broadcast::findOrFail($id);
        return view('admin.broadcasts.show', compact('broadcast'));
    }
}
