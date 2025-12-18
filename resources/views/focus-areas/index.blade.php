@extends('layouts.app')

@section('title', 'Our Focus Areas | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8">
                <span class="ngo-hero-badge" style="background-color:#ffcc00; color:#111;">
                    Our Work • Our Calling
                </span>

                <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">
                    Our Focus Areas
                </h1>

                <p class="ngo-hero-text mt-4" style="color:rgba(255, 204, 0, 0.85); max-width:700px;">
                    Fragrance Of God works through clearly defined focus areas that reflect
                    our faith, mission, and commitment to transforming lives and communities
                    through compassion, service, and spiritual empowerment.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= INTRO ================= -->
<section class="py-5">
    <div class="container text-center" style="max-width:900px;">
        <h2 class="fw-bold" style="color:#ffcc00;">How We Serve</h2>
        <p class="text-muted fs-5 mt-3">
            Our programs are designed to address both spiritual and practical needs,
            ensuring holistic transformation for individuals, families, and communities.
        </p>
    </div>
</section>

<!-- ================= FOCUS AREAS ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            <!-- Focus Area 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <div class="icon-circle bg-warning text-dark mb-4 d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width:65px; height:65px;">
                        <i class="fas fa-hands-helping fa-lg"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color:#ffcc00;">
                        Community Outreach & Care
                    </h4>
                    <p class="text-muted">
                        We serve vulnerable communities through food support, relief assistance,
                        counseling, prayer, and social care initiatives that restore dignity
                        and hope.
                    </p>
                </div>
            </div>

            <!-- Focus Area 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <div class="icon-circle bg-warning text-dark mb-4 d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width:65px; height:65px;">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color:#ffcc00;">
                        Youth & Family Empowerment
                    </h4>
                    <p class="text-muted">
                        We equip youth and families with life skills, values, mentorship,
                        and spiritual guidance to build resilient households and future leaders.
                    </p>
                </div>
            </div>

            <!-- Focus Area 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <div class="icon-circle bg-warning text-dark mb-4 d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width:65px; height:65px;">
                        <i class="fas fa-praying-hands fa-lg"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color:#ffcc00;">
                        Faith & Discipleship
                    </h4>
                    <p class="text-muted">
                        We nurture spiritual growth through discipleship programs,
                        prayer initiatives, biblical teaching, and leadership development.
                    </p>
                </div>
            </div>

            <!-- Focus Area 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <div class="icon-circle bg-warning text-dark mb-4 d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width:65px; height:65px;">
                        <i class="fas fa-briefcase fa-lg"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color:#ffcc00;">
                        Economic Empowerment
                    </h4>
                    <p class="text-muted">
                        We support sustainable livelihoods through skills training,
                        entrepreneurship support, and income-generating initiatives.
                    </p>
                </div>
            </div>

            <!-- Focus Area 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <div class="icon-circle bg-warning text-dark mb-4 d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width:65px; height:65px;">
                        <i class="fas fa-heartbeat fa-lg"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color:#ffcc00;">
                        Health & Well-Being
                    </h4>
                    <p class="text-muted">
                        We promote physical, emotional, and mental well-being through
                        health education, counseling, and community wellness initiatives.
                    </p>
                </div>
            </div>

            <!-- Focus Area 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                    <div class="icon-circle bg-warning text-dark mb-4 d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width:65px; height:65px;">
                        <i class="fas fa-hand-holding-heart fa-lg"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color:#ffcc00;">
                        Compassion & Advocacy
                    </h4>
                    <p class="text-muted">
                        We advocate for justice, dignity, and care for the vulnerable,
                        standing with those affected by poverty, abuse, and social exclusion.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Partner With Us</h2>
        <p class="lead mt-3">
            Together, we can expand our reach and deepen our impact
            across communities and generations.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
                Support Our Work
            </a>
            <a href="/contact" class="btn btn-outline-light btn-lg" style="border-color:#ffcc00; color:#ffcc00;">
                Partner With Us
            </a>
        </div>
    </div>
</section>

@endsection
