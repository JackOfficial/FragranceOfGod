<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Projects index page
    public function index()
    {
        // Example projects data
        $projects = [
            [
                'title' => 'Girls Education Empowerment',
                'slug' => 'girls-education-empowerment',
                'short_desc' => 'Providing education access and scholarships to girls in rural communities.',
                'img' => 'project-1.jpg',
            ],
            [
                'title' => 'Community Health Initiative',
                'slug' => 'community-health-initiative',
                'short_desc' => 'Promoting health awareness and preventive care in vulnerable communities.',
                'img' => 'project-2.jpg',
            ],
            [
                'title' => 'Youth Entrepreneurship Program',
                'slug' => 'youth-entrepreneurship-program',
                'short_desc' => 'Empowering youth with skills and resources to start small businesses.',
                'img' => 'project-3.jpg',
            ],
        ];

        return view('projects.index', compact('projects'));
    }

    // Single project page
    public function show($slug)
    {
        // Example project details
        $project = [
            'title' => 'Girls Education Empowerment',
            'slug' => 'girls-education-empowerment',
            'desc' => '<p>This project provides access to quality education for girls in rural communities, including scholarships, mentorship, and school supplies.</p><p>Our goal is to break the cycle of poverty and empower the next generation of female leaders.</p>',
            'img' => 'project-1.jpg',
        ];

        // Example related projects
        $relatedProjects = [
            ['title'=>'Community Health Initiative', 'slug'=>'community-health-initiative'],
            ['title'=>'Youth Entrepreneurship Program', 'slug'=>'youth-entrepreneurship-program'],
        ];

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
