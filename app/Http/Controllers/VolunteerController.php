<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller
{
    /**
     * Display the Volunteers page.
     */
    public function index()
    {
        // Sample volunteer opportunities
        $opportunities = [
            [
                'title' => 'Community Outreach Volunteer',
                'desc' => 'Assist in delivering food, organizing events, and supporting vulnerable communities.',
                'icon' => 'fas fa-hands-helping',
            ],
            [
                'title' => 'Youth Mentorship Volunteer',
                'desc' => 'Guide and mentor youth through life skills, spiritual growth, and educational support.',
                'icon' => 'fas fa-users',
            ],
            [
                'title' => 'Health & Wellness Volunteer',
                'desc' => 'Support health initiatives, awareness campaigns, and wellness programs.',
                'icon' => 'fas fa-heartbeat',
            ],
            [
                'title' => 'Fundraising & Advocacy Volunteer',
                'desc' => 'Promote our mission, help raise funds, and advocate for vulnerable populations.',
                'icon' => 'fas fa-hand-holding-heart',
            ],
        ];

        return view('volunteers.index', compact('opportunities'));
    }

    /**
     * Show the Volunteer Signup form.
     */
    public function signup()
    {
        return view('volunteers.signup');
    }

    /**
     * Handle Volunteer Signup form submission.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'opportunity' => 'required|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        // Here, you could save to database or send an email
        // Example: Sending email to admin
        Mail::raw("New volunteer signup:\nName: {$request->name}\nEmail: {$request->email}\nPhone: {$request->phone}\nOpportunity: {$request->opportunity}\nMessage: {$request->message}", function($message) {
            $message->to('info@fragranceofgod.org')
                    ->subject('New Volunteer Signup');
        });

        return redirect()->back()->with('success', 'Thank you for signing up! We will contact you soon.');
    }
}
