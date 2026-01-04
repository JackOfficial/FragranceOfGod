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
                    Explore inspiring stories from the communities we serve, our volunteers,
                    and partners. Each story reflects the hope, faith, and compassion
                    behind Fragrance Of God.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= STORIES LIST ================= -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Latest Stories</h2>
            <p class="text-muted fs-5 mt-3">
                Real experiences from those impacted by our mission
            </p>
        </div>

        <div class="row g-4">

            @forelse($stories as $story)
                @php
                    $image = $story->media->firstWhere('file_type', 'image');
                @endphp

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        <!-- Story Image -->
                        <img
                            src="{{ $image ? asset('storage/'.$image->file_path) : asset('frontend/img/default-story.jpg') }}"
                            class="card-img-top"
                            style="height:220px; object-fit:cover"
                            alt="{{ $story->title }}">

                        <div class="card-body p-4 d-flex flex-column">

                            <!-- Title -->
                            <h5 class="fw-bold mb-2" style="color:#ffcc00;">
                                {{ $story->title }}
                            </h5>

                            <!-- Meta -->
                            <small class="text-muted mb-2">
                                <i class="fas fa-user me-1"></i>
                                {{ $story->author->name ?? 'HFRO Team' }}
                                •
                                <i class="fas fa-calendar-alt ms-1 me-1"></i>
                                {{ $story->created_at->format('d M, Y') }}
                            </small>

                            <!-- Excerpt -->
                            <p class="text-muted mt-2 flex-grow-1">
                                {{ Str::limit(strip_tags($story->description), 120) }}
                            </p>

                            <!-- Read More -->
                            <a href="{{ route('stories.show', $story->slug) }}"
                               class="fw-semibold mt-auto"
                               style="color:#ffcc00; text-decoration:none;">
                                Read More →
                            </a>

                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center text-muted">
                    <p>No stories available at the moment. Please check back later.</p>
                </div>
            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $stories->links('pagination::bootstrap-4') }}
        </div>

    </div>
</section>

<!-- ================= IMPACT HIGHLIGHTS ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Our Impact</h2>
            <p class="text-muted fs-5 mt-3">
                Stories translated into measurable results
            </p>
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

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Share Your Story</h2>
        <p class="lead mt-3">
            Have you experienced Fragrance Of God’s impact firsthand?
            Connect with us and inspire others.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="/contact"
               class="btn btn-lg"
               style="background-color:#ffcc00; color:#111; font-weight:600;">
                Contact Us
            </a>
            <a href="/donate"
               class="btn btn-outline-light btn-lg"
               style="border-color:#ffcc00; color:#ffcc00;">
                Support Our Mission
            </a>
        </div>
    </div>
</section>

@endsection
