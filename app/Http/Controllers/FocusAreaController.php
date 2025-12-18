<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FocusAreaController extends Controller
{
    /**
     * Display all focus areas
     */
    public function index()
    {
        // Temporary static data (replace with DB later)
        $focusAreas = [
            [
                'title' => 'Community Outreach & Care',
                'slug'  => 'community-outreach-care',
                'excerpt' => 'Serving vulnerable communities through compassion, relief, prayer, and holistic care.',
                'icon' => 'fas fa-hands-helping',
                'image' => 'focus-community.jpg',
            ],
            [
                'title' => 'Youth & Family Empowerment',
                'slug'  => 'youth-family-empowerment',
                'excerpt' => 'Equipping youth and families with life skills, values, and spiritual guidance.',
                'icon' => 'fas fa-users',
                'image' => 'focus-youth.jpg',
            ],
            [
                'title' => 'Faith & Discipleship',
                'slug'  => 'faith-discipleship',
                'excerpt' => 'Nurturing spiritual growth through teaching, mentorship, and prayer.',
                'icon' => 'fas fa-praying-hands',
                'image' => 'focus-faith.jpg',
            ],
        ];

        return view('focus-areas.index', compact('focusAreas'));
    }

    /**
     * Display a single focus area
     */
    public function show($slug)
    {
        // Temporary static dataset (DB-ready later)
        $focusAreas = [
            'community-outreach-care' => [
                'title' => 'Community Outreach & Care',
                'description' => 'Serving vulnerable individuals and communities through compassion, practical support, counseling, and prayer.',
                'image' => 'focus-community.jpg',
            ],
            'youth-family-empowerment' => [
                'title' => 'Youth & Family Empowerment',
                'description' => 'Empowering young people and families through education, mentorship, and faith-based values.',
                'image' => 'focus-youth.jpg',
            ],
            'faith-discipleship' => [
                'title' => 'Faith & Discipleship',
                'description' => 'Encouraging spiritual growth through discipleship, mentorship, and prayer programs.',
                'image' => 'focus-faith.jpg',
            ],
        ];

        // Handle invalid slugs professionally
        if (!array_key_exists($slug, $focusAreas)) {
            abort(404);
        }

        $focusArea = $focusAreas[$slug];

        return view('focus-areas.show', compact('focusArea'));
    }
}
