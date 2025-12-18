@extends('layouts.app')

@section('title', 'Our Programs | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title" style="color:#ffcc00;">Our Programs</h1>
        <p class="text-light lead mt-3">
            Structured initiatives transforming lives through faith and service
        </p>
    </div>
</section>

<!-- ================= PROGRAMS ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            @foreach($programs as $program)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <div class="icon-circle bg-warning text-dark mb-3 d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width:65px; height:65px;">
                        <i class="{{ $program['icon'] }} fa-lg"></i>
                    </div>

                    <h4 class="fw-bold mb-3" style="color:#ffcc00;">
                        {{ $program['title'] }}
                    </h4>

                    <p class="text-muted">
                        {{ $program['excerpt'] }}
                    </p>

                    <a href="{{ route('programs.show', $program['slug']) }}"
                       class="mt-auto fw-bold text-decoration-none"
                       style="color:#111;">
                        Learn More →
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Support Our Programs</h2>
        <p class="lead mt-3">
            Your partnership helps us sustain long-term impact.
        </p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Donate Now
        </a>
    </div>
</section>

@endsection
