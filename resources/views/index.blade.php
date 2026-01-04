@extends('layouts.app')

@section('title', 'Fragrance Of God | Faith, Compassion & Community Impact')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-7 col-md-9">
                <span class="ngo-hero-badge" style="background-color:#ffcc00; color:#111;">
                    Faith • Compassion • Service
                </span>

                <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">
                    Spreading the Fragrance of God<br class="d-none d-md-block">
                    Through Love in Action
                </h1>

                <p class="ngo-hero-text mt-4" style="color:rgba(255, 204, 0, 0.85);">
                    Fragrance Of God is a faith-based non-profit organization committed
                    to restoring hope, uplifting communities, and transforming lives
                    through compassion, service, and spiritual empowerment.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ url('/donate') }}" class="btn btn-dark btn-lg px-5" style="background-color:#111; color:#ffcc00; border:none;">
                        Support Our Mission
                    </a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-light btn-lg px-5" style="border-color:#ffcc00; color:#ffcc00;">
                        Learn Our Story
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= TRUST / STATS ================= -->
<section class="py-4 border-top border-bottom">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">10+</h3>
                <p class="text-muted">Years of Service</p>
            </div>
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
                <p class="text-muted">Partners</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= ABOUT SNAPSHOT ================= -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <img src="{{ asset('frontend/img/about.jpg') }}" class="img-fluid rounded shadow" alt="About Fragrance Of God">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Who We Are</h2>
                <p class="text-muted mt-3">
                    Fragrance Of God exists to demonstrate God’s love through action.
                    We work with communities to restore hope, strengthen families,
                    empower youth, and support vulnerable individuals spiritually,
                    socially, and economically.
                </p>
                <a href="/about" class="btn btn-outline-dark mt-3" style="border-color:#ffcc00; color:#ffcc00;">
                    Read Our Story
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= PROGRAMS ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Our Core Programs</h2>
            <p class="text-muted fs-5">Transforming lives through faith and service</p>
        </div>

        <!-- Programs Grid -->
        <div class="row g-4">
            <!-- Program Card 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 position-relative overflow-hidden">
                    <div class="p-4">
                        <div class="icon-circle bg-warning text-dark mb-3 d-inline-flex align-items-center justify-content-center rounded-circle" style="width:60px; height:60px;">
                            <i class="fas fa-hands-helping fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color:#ffcc00;">Community Outreach</h5>
                        <p class="text-muted">
                            Serving vulnerable communities through food support,
                            prayer, counseling, and social programs.
                        </p>
                    </div>
                    <div class="program-hover position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 204, 0, 0.1); opacity:0; transition: all 0.3s;"></div>
                </div>
            </div>

            <!-- Program Card 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 position-relative overflow-hidden">
                    <div class="p-4">
                        <div class="icon-circle bg-warning text-dark mb-3 d-inline-flex align-items-center justify-content-center rounded-circle" style="width:60px; height:60px;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color:#ffcc00;">Youth & Family Empowerment</h5>
                        <p class="text-muted">
                            Equipping young people and families with values,
                            life skills, and spiritual guidance.
                        </p>
                    </div>
                    <div class="program-hover position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 204, 0, 0.1); opacity:0; transition: all 0.3s;"></div>
                </div>
            </div>

            <!-- Program Card 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 position-relative overflow-hidden">
                    <div class="p-4">
                        <div class="icon-circle bg-warning text-dark mb-3 d-inline-flex align-items-center justify-content-center rounded-circle" style="width:60px; height:60px;">
                            <i class="fas fa-praying-hands fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color:#ffcc00;">Faith & Discipleship</h5>
                        <p class="text-muted">
                            Encouraging spiritual growth through teachings,
                            mentorship, and prayer programs.
                        </p>
                    </div>
                    <div class="program-hover position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 204, 0, 0.1); opacity:0; transition: all 0.3s;"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ================= EVENTS ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Upcoming & Recent Events</h2>
            <p class="text-muted">Our work in action</p>
        </div>

        <div class="row g-4">
            @forelse($events as $event)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    @php
                        // Check if event has image media
                        $image = $event->media->firstWhere('file_type', 'image');
                    @endphp
                    <img src="{{ $image ? asset('storage/'.$image->file_path) : asset('frontend/img/default-event.jpg') }}" class="card-img-top" alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="fw-bold" style="color:#ffcc00;">{{ $event->title }}</h5>
                        <p class="text-muted">{{ Str::limit($event->description, 100) }}</p>
                        <small class="text-muted">
                            📍 {{ $event->location }} | 🗓 {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}
                        </small>
                        <div class="mt-2">
                            <a href="/events/{{ $event->slug }}" class="btn btn-sm btn-success mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>No events available at the moment. Stay tuned!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">What People Say</h2>
            <p class="text-muted">Lives touched by Fragrance Of God</p>
        </div>

        <div class="row g-4">
            @foreach ([
                ['quote'=>'Through Fragrance Of God, I found hope, faith, and a family that truly cares.', 'name'=>'Grace M.', 'role'=>'Program Beneficiary'],
                ['quote'=>'Their commitment to faith and community transformation is truly inspiring.', 'name'=>'Local Pastor', 'role'=>'Community Partner'],
                ['quote'=>'You don’t just hear about God’s love — you experience it.', 'name'=>'Volunteer', 'role'=>'Field Team Member']
            ] as $test)
            <div class="col-md-4">
                <div class="card p-4 shadow-sm h-100">
                    <p class="fst-italic">“{{ $test['quote'] }}”</p>
                    <h6 class="fw-bold mt-3 mb-0">{{ '— '.$test['name'] }}</h6>
                    <small class="text-muted">{{ $test['role'] }}</small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= STORIES ================= -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h5 class="d-inline-block"
                style="color:#ffcc00; text-transform:uppercase; border-bottom: 4px solid #d32f2f;">
                Stories
            </h5>
            <h1 class="display-5 fw-bold" style="color:#111;">
                Our Latest Stories & Impact
            </h1>
        </div>

        <div class="row g-5">
            @forelse($stories as $story)
                @php
                    $image = $story->media->firstWhere('file_type', 'image');
                @endphp

                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden shadow-sm h-100">
                        <img
                            class="img-fluid w-100"
                            style="height:230px; object-fit:cover"
                            src="{{ $image ? asset('storage/'.$image->file_path) : asset('frontend/img/default-story.jpg') }}"
                            alt="{{ $story->title }}">

                        <div class="p-4">
                            <a class="h4 d-block mb-3 text-decoration-none"
                               href="{{ route('stories.show', $story->slug) }}"
                               style="color:#111;">
                                {{ $story->title }}
                            </a>

                            <p class="m-0 text-muted">
                                {{ Str::limit(strip_tags($story->description), 120) }}
                            </p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top p-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-circle me-2 text-muted"></i>
                                <small>{{ $story->author->name ?? 'HFRO Team' }}</small>
                            </div>
                            <small class="text-muted">
                                {{ $story->created_at->format('d M, Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    <p>No stories available yet. Please check back soon.</p>
                </div>
            @endforelse
        </div>

        @if($stories->count() >= 3)
            <div class="text-center mt-5">
                <a href="{{ route('stories.index') }}"
                   class="btn btn-outline-dark px-5"
                   style="border-color:#ffcc00; color:#ffcc00;">
                    View All Stories
                </a>
            </div>
        @endif
    </div>
</div>


<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Join Us in Spreading Hope</h2>
        <p class="lead">
            Your support helps us continue transforming lives through faith and love.
        </p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">Support Our Mission</a>
    </div>
</section>

@endsection
