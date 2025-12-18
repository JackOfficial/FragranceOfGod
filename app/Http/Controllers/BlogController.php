<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Blog listing page
    public function index()
    {
        // Normally, you fetch from database like Blog::latest()->get();
        $blogs = [
            [
                'title' => 'Empowering Girls Through Education in Kigali',
                'slug' => 'empowering-girls-through-education-in-kigali',
                'short_desc' => 'Creating opportunities for young girls to access quality education.',
                'author' => 'Jane Mukamana',
                'img' => 'blog-1.jpg',
                'views' => 245,
                'comments' => 12,
                'date' => '2025-07-10'
            ],
            [
                'title' => 'Community Health Awareness Campaigns',
                'slug' => 'community-health-awareness-campaigns',
                'short_desc' => 'Workshops and health campaigns to educate communities about nutrition and hygiene.',
                'author' => 'Paul Habimana',
                'img' => 'blog-2.jpg',
                'views' => 310,
                'comments' => 18,
                'date' => '2025-06-15'
            ],
            [
                'title' => 'Economic Empowerment for Women',
                'slug' => 'economic-empowerment-for-women',
                'short_desc' => 'Equipping women with skills and resources to start small businesses.',
                'author' => 'Emmanuel Niyonsaba',
                'img' => 'blog-3.jpg',
                'views' => 198,
                'comments' => 9,
                'date' => '2025-05-20'
            ],
        ];

        return view('blogs.index', compact('blogs'));
    }

    // Single blog page
   public function show($slug)
{
    // Fetch the blog post (replace with DB query in production)
    $blog = [
        'title' => 'Empowering Girls Through Education in Kigali',
        'slug' => $slug,
        'short_desc' => 'Creating opportunities for young girls to access quality education.',
        'desc' => '<p>Full detailed story about the program goes here...</p>',
        'author' => 'Jane Mukamana',
        'img' => 'blog-1.jpg',
        'views' => 245,
        'comments' => 12,
        'date' => '2025-07-10'
    ];

    // Related blogs (normally fetched from DB excluding current slug)
    $relatedBlogs = [
        [
            'title' => 'Community Health Awareness Campaigns',
            'slug' => 'community-health-awareness-campaigns',
            'short_desc' => 'Workshops and health campaigns in communities.',
            'img' => 'blog-2.jpg'
        ],
        [
            'title' => 'Economic Empowerment for Women',
            'slug' => 'economic-empowerment-for-women',
            'short_desc' => 'Skills and resources for women entrepreneurs.',
            'img' => 'blog-3.jpg'
        ]
    ];

    return view('blogs.show', compact('blog', 'relatedBlogs'));
}

}
