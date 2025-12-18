@extends('layouts.app')

@section('title', 'Our Stories | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8">
                <span class="ngo-hero-badge" style="background-color:#ffcc00; color:#111;">
                    Real Stories • Real Impact
                </span>

                <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">
                    Transforming Lives, One Story at a Time
                </h1>

                <p class="ngo-hero-text mt-4" style="color:rgba(255, 204, 0, 0.85); max-width:700px;">
                    Explore inspiring stories from the communities we serve, our volunteers, and partners. 
                    Each story reflects the hope, faith, and compassion that drive Fragrance Of God’s mission.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= FEATURED STORIES ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Featured Stories</h2>
            <p class="text-muted fs-5 mt-3">Real experiences from those impacted by our work</p>
        </div>

        <div class="row g-4">
            @foreach ([
                ['title'=>'Empowering Girls Through Education', 'desc'=>'Meet Aline, a young girl in Kigali whose life was transformed through education programs.', 'img'=>'story-1.jpg'],
                ['title'=>'Community Health Awareness', 'desc'=>'Discover how our health initiatives improved access to care for rural communities.', 'img'=>'story-2.jpg'],
                ['title'=>'Restoring Family Dignity', 'desc'=>'Read about a family in Musanze that received counseling and support to rebuild their lives.', 'img'=>'story-3.jpg']
            ] as $story)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ asset('frontend/img/'.$story['img']) }}" class="card-img-top" alt="{{ $story['title'] }}">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3" style="color:#ffcc00;">{{ $story['title'] }}</h5>
                        <p class="text-muted">{{ $story['desc'] }}</p>
                        <a href="#" class="text-decoration-none fw-semibold" style="color:#ffcc00;">Read More →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= IMPACT HIGHLIGHTS ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Our Impact</h2>
            <p class="text-muted fs-5 mt-3">Stories translated into measurable results</p>
        </div>

        <div class="row text-center g-4">
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">5,000+</h3>
                <p class="text-muted">Lives Impacted</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">120+</h3>
                <p class="text-muted">Community Programs</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">30+</h3>
                <p class="text-muted">Partnerships</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">10+</h3>
                <p class="text-muted">Years of Service</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= CALL TO ACTION ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Share Your Story</h2>
        <p class="lead mt-3">
            Have you experienced Fragrance Of God’s impact firsthand? Connect with us and share your story to inspire others.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="/contact" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
                Contact Us
            </a>
            <a href="/donate" class="btn btn-outline-light btn-lg" style="border-color:#ffcc00; color:#ffcc00;">
                Support Our Mission
            </a>
        </div>
    </div>
</section>

@endsection
