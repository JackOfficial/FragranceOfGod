@extends('layouts.app')

@section('title', 'Volunteers | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Join Our Volunteers</h1>
        <p class="text-light lead mt-3">Make a difference in lives and communities through service.</p>
        <a href="/volunteer/signup" class="btn btn-lg mt-4" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Sign Up Now
        </a>
    </div>
</section>

<!-- ================= INTRO ================= -->
<section class="py-5">
    <div class="container text-center" style="max-width:900px;">
        <h2 class="fw-bold" style="color:#ffcc00;">Why Volunteer With Us?</h2>
        <p class="text-muted fs-5 mt-3">
            Volunteering with Fragrance Of God provides an opportunity to actively contribute to community transformation,
            develop skills, meet passionate people, and experience the joy of giving.
        </p>
    </div>
</section>

<!-- ================= VOLUNTEER OPPORTUNITIES ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            @foreach ($opportunities as $opportunity)
            <div class="col-lg-6 col-md-12">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 d-flex flex-row align-items-start gap-3">
                    <div class="icon-circle bg-warning text-dark d-flex align-items-center justify-content-center rounded-circle" style="width:60px; height:60px;">
                        <i class="{{ $opportunity['icon'] }} fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-2" style="color:#ffcc00;">{{ $opportunity['title'] }}</h4>
                        <p class="text-muted mb-0">{{ $opportunity['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ================= MID-SECTION CTA ================= -->
        <div class="text-center mt-5">
            <a href="/volunteer/signup" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
                Sign Up to Volunteer
            </a>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Become a Volunteer</h2>
        <p class="lead mt-3">
            Join our team and help us transform lives. Your time and passion can create lasting impact.
        </p>
        <a href="/volunteer/signup" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Sign Up to Volunteer
        </a>
    </div>
</section>

@endsection
