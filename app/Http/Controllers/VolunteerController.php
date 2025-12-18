<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
