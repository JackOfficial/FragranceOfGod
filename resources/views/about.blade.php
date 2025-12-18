@extends('layouts.app')

@section('title', 'About Us | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:70vh;">
    <div class="ngo-hero-overlay"></div>

    <div class="container position-relative text-center">
        <span class="ngo-hero-badge" style="background:#ffcc00; color:#111;">
            About Fragrance Of God
        </span>

        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">
            Who We Are & Why We Exist
        </h1>

        <p class="ngo-hero-text mx-auto mt-4" style="max-width:720px; color:rgba(255,204,0,.85);">
            A faith-based non-profit organization committed to restoring hope,
            uplifting communities, and transforming lives through love in action.
        </p>
    </div>
</section>

<!-- ================= INTRO ================= -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Our Story</h2>
                <p class="text-muted mt-3">
                    Fragrance Of God was founded with a simple yet powerful calling:
                    to demonstrate God’s love in practical and transformative ways.
                    We believe faith is not just spoken — it is lived.
                </p>
                <p class="text-muted">
                    Over the years, we have partnered with communities to restore
                    dignity, strengthen families, empower youth, and support the
                    most vulnerable through holistic programs rooted in compassion,
                    service, and spiritual growth.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('frontend/img/about.jpg') }}" class="img-fluid rounded-4 shadow" alt="Our Story">
            </div>
        </div>
    </div>
</section>

<!-- ================= MISSION / VISION / VALUES ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 h-100 bg-white rounded-4 shadow-sm">
                    <i class="fas fa-bullseye fa-2x mb-3" style="color:#ffcc00;"></i>
                    <h5 class="fw-bold">Our Mission</h5>
                    <p class="text-muted">
                        To restore hope and transform lives by demonstrating
                        God’s love through faith-driven community service.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 h-100 bg-white rounded-4 shadow-sm">
                    <i class="fas fa-eye fa-2x mb-3" style="color:#ffcc00;"></i>
                    <h5 class="fw-bold">Our Vision</h5>
                    <p class="text-muted">
                        Thriving communities where individuals and families live
                        with dignity, purpose, and spiritual fulfillment.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 h-100 bg-white rounded-4 shadow-sm">
                    <i class="fas fa-heart fa-2x mb-3" style="color:#ffcc00;"></i>
                    <h5 class="fw-bold">Our Values</h5>
                    <p class="text-muted">
                        Faith, compassion, integrity, accountability, and service
                        to humanity.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= WHAT MAKES US DIFFERENT ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">What Makes Us Different</h2>
            <p class="text-muted">Our faith-rooted, people-centered approach</p>
        </div>

        <div class="row g-4">
            @foreach ([
                ['icon'=>'fa-praying-hands','title'=>'Faith-Centered','desc'=>'Our work is grounded in Christian values and spiritual guidance.'],
                ['icon'=>'fa-people-carry','title'=>'Community-Driven','desc'=>'We work with communities, not for them.'],
                ['icon'=>'fa-hand-holding-heart','title'=>'Holistic Impact','desc'=>'Addressing spiritual, social, and economic needs together.'],
                ['icon'=>'fa-globe','title'=>'Sustainable Change','desc'=>'Long-term solutions that empower communities.']
            ] as $item)
            <div class="col-md-3">
                <div class="text-center p-4 h-100 rounded-4 shadow-sm">
                    <i class="fas {{ $item['icon'] }} fa-2x mb-3" style="color:#ffcc00;"></i>
                    <h6 class="fw-bold">{{ $item['title'] }}</h6>
                    <p class="text-muted small">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= IMPACT ================= -->
<section class="py-5 bg-dark text-center">
    <div class="container">
        <h2 class="fw-bold mb-4" style="color:#ffcc00;">Our Impact So Far</h2>

        <div class="row g-4">
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">10+</h3>
                <p class="text-light">Years of Service</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">5,000+</h3>
                <p class="text-light">Lives Impacted</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">120+</h3>
                <p class="text-light">Programs Delivered</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold" style="color:#ffcc00;">30+</h3>
                <p class="text-light">Partners</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold">Be Part of the Story</h2>
        <p class="text-muted mb-4">
            Join us in spreading hope, restoring dignity, and transforming lives.
        </p>

        <a href="/donate" class="btn btn-lg me-3" style="background:#ffcc00; color:#111;">
            Donate
        </a>
        <a href="/contact" class="btn btn-outline-dark btn-lg" style="border-color:#ffcc00; color:#ffcc00;">
            Partner With Us
        </a>
    </div>
</section>

@endsection
