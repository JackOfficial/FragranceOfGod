@extends('layouts.app')

@section('title', 'Community Outreach & Care | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8">
                <span class="ngo-hero-badge" style="background-color:#ffcc00; color:#111;">
                    Our Focus Area
                </span>

                <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">
                    Community Outreach & Care
                </h1>

                <p class="ngo-hero-text mt-4" style="color:rgba(255, 204, 0, 0.85); max-width:700px;">
                    Serving vulnerable individuals and communities through compassion,
                    practical support, prayer, and holistic care.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= OVERVIEW ================= -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Overview</h2>
                <p class="text-muted fs-5 mt-3">
                    Our Community Outreach & Care focus area exists to respond to urgent
                    needs within vulnerable communities. We believe that demonstrating
                    God’s love through action restores dignity, builds trust, and opens
                    pathways to lasting transformation.
                </p>
                <p class="text-muted">
                    Through outreach initiatives, relief support, counseling, and prayer,
                    we walk alongside individuals and families during their most
                    challenging moments.
                </p>
            </div>

            <div class="col-lg-6">
                <img src="{{ asset('frontend/img/focus-community.jpg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Community Outreach & Care">
            </div>
        </div>
    </div>
</section>

<!-- ================= WHAT WE DO ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">What We Do</h2>
            <p class="text-muted fs-5">
                Key activities under this focus area
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <i class="fas fa-box-open fa-2x mb-3 text-warning"></i>
                    <h5 class="fw-bold">Relief & Basic Support</h5>
                    <p class="text-muted">
                        Providing food, clothing, and emergency assistance to families
                        facing hardship.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <i class="fas fa-comments fa-2x mb-3 text-warning"></i>
                    <h5 class="fw-bold">Counseling & Guidance</h5>
                    <p class="text-muted">
                        Offering emotional and spiritual counseling to restore hope
                        and strengthen resilience.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <i class="fas fa-praying-hands fa-2x mb-3 text-warning"></i>
                    <h5 class="fw-bold">Prayer & Pastoral Care</h5>
                    <p class="text-muted">
                        Standing with individuals through prayer, discipleship,
                        and faith-based support.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= IMPACT ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Our Impact</h2>
            <p class="text-muted fs-5">
                The difference this focus area is making
            </p>
        </div>

        <div class="row text-center">
            <div class="col-md-4">
                <h3 class="fw-bold" style="color:#ffcc00;">3,000+</h3>
                <p class="text-muted">People Supported</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold" style="color:#ffcc00;">45+</h3>
                <p class="text-muted">Community Outreach Programs</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold" style="color:#ffcc00;">120+</h3>
                <p class="text-muted">Volunteers Engaged</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= RELATED STORIES ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Stories From the Field</h2>
            <p class="text-muted">
                Real lives, real impact
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog-1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h6 class="fw-bold">Restoring Hope Through Community Care</h6>
                        <p class="text-muted small">
                            How outreach programs are transforming vulnerable families.
                        </p>
                        <a href="#" class="text-warning fw-semibold">Read Story →</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog-2.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h6 class="fw-bold">Standing With Families in Crisis</h6>
                        <p class="text-muted small">
                            Responding with compassion when it matters most.
                        </p>
                        <a href="#" class="text-warning fw-semibold">Read Story →</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog-3.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h6 class="fw-bold">Faith in Action</h6>
                        <p class="text-muted small">
                            Serving communities through prayer and practical care.
                        </p>
                        <a href="#" class="text-warning fw-semibold">Read Story →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Support This Focus Area</h2>
        <p class="lead mt-3">
            Your generosity helps us continue serving communities
            with compassion and faith.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="/donate" class="btn btn-lg"
               style="background-color:#ffcc00; color:#111; font-weight:600;">
                Donate Now
            </a>
            <a href="/contact" class="btn btn-outline-light btn-lg"
               style="border-color:#ffcc00; color:#ffcc00;">
                Get Involved
            </a>
        </div>
    </div>
</section>

@endsection
