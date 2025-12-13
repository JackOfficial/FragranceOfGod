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

    <div class="ngo-hero-shape"></div>
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
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Our Core Programs</h2>
            <p class="text-muted">Transforming lives through faith and service</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4">
                    <h5 class="fw-bold" style="color:#ffcc00;">Community Outreach</h5>
                    <p class="text-muted">
                        Serving vulnerable communities through food support,
                        prayer, counseling, and social programs.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4">
                    <h5 class="fw-bold" style="color:#ffcc00;">Youth & Family Empowerment</h5>
                    <p class="text-muted">
                        Equipping young people and families with values,
                        life skills, and spiritual guidance.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4">
                    <h5 class="fw-bold" style="color:#ffcc00;">Faith & Discipleship</h5>
                    <p class="text-muted">
                        Encouraging spiritual growth through teachings,
                        mentorship, and prayer programs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

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
