<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    private $programs = [
        [
            'slug' => 'community-outreach',
            'title' => 'Community Outreach Program',
            'icon' => 'fas fa-hands-helping',
            'excerpt' => 'Serving vulnerable communities through compassion, relief, and care.',
            'description' => '
                <p>The Community Outreach Program exists to restore dignity and hope
                among vulnerable individuals and families.</p>

                <p>Through food assistance, home visits, counseling, and prayer,
                we respond to urgent needs while building long-term relationships.</p>
            ',
            'objectives' => [
                'Support vulnerable households',
                'Provide spiritual and emotional care',
                'Promote dignity and inclusion'
            ]
        ],
        [
            'slug' => 'youth-mentorship',
            'title' => 'Youth & Family Empowerment Program',
            'icon' => 'fas fa-users',
            'excerpt' => 'Equipping youth and families with values, skills, and mentorship.',
            'description' => '
                <p>This program focuses on nurturing responsible, resilient,
                and faith-driven young people and families.</p>

                <p>We provide mentorship, life-skills training,
                leadership development, and family strengthening initiatives.</p>
            ',
            'objectives' => [
                'Develop youth leadership skills',
                'Strengthen family relationships',
                'Promote positive values'
            ]
        ],
        [
            'slug' => 'faith-discipleship',
            'title' => 'Faith & Discipleship Program',
            'icon' => 'fas fa-praying-hands',
            'excerpt' => 'Nurturing spiritual growth and leadership development.',
            'description' => '
                <p>The Faith & Discipleship Program strengthens spiritual foundations
                through prayer, biblical teaching, and mentorship.</p>

                <p>We aim to develop servant leaders who live out their faith
                in everyday life.</p>
            ',
            'objectives' => [
                'Encourage spiritual growth',
                'Develop faith-based leaders',
                'Promote prayer and discipleship'
            ]
        ],
    ];

    public function index()
    {
        return view('programs.index', [
            'programs' => $this->programs
        ]);
    }

    public function show($slug)
    {
        $program = collect($this->programs)->firstWhere('slug', $slug);

        abort_if(!$program, 404);

        $relatedPrograms = collect($this->programs)
            ->where('slug', '!=', $slug)
            ->take(3);

        return view('programs.show', compact('program', 'relatedPrograms'));
    }
}
