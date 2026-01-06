<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of subscribers.
     */
    public function index()
    {
        // Get subscribers, latest first, paginate 15 per page
        $subscribers = Subscriber::latest()->paginate(15);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new subscriber.
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created subscriber in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return redirect()
            ->route('admin.subscribers.index')
            ->with('success', 'Subscriber added successfully.');
    }

    /**
     * Remove the specified subscriber from storage.
     */
    public function destroy(string $id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()
            ->route('admin.subscribers.index')
            ->with('success', 'Subscriber deleted successfully.');
    }
}
