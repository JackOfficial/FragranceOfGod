@extends('layouts.app')

@section('title', 'Fragrance Of God | Faith, Compassion & Community Impact')

@section('content')

<!-- ================= HERO ================= -->
<!-- ================= HERO SECTION ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <!-- Overlay -->
    <div class="ngo-hero-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-7 col-md-9">
                <span class="ngo-hero-badge">
                    Faith • Compassion • Service
                </span>

                <h1 class="ngo-hero-title mt-3">
                    Spreading the Fragrance of God<br class="d-none d-md-block">
                    Through Love in Action
                </h1>

                <p class="ngo-hero-text mt-4">
                    Fragrance Of God is a faith-based non-profit organization committed
                    to restoring hope, uplifting communities, and transforming lives
                    through compassion, service, and spiritual empowerment.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ url('/donate') }}" class="btn btn-light btn-lg px-5">
                        Support Our Mission
                    </a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-light btn-lg px-5">
                        Learn Our Story
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom curve -->
    <div class="ngo-hero-shape"></div>
</section>


<!-- ================= TRUST / STATS ================= -->
<section class="py-4 border-top border-bottom">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <h3 class="fw-bold">10+</h3>
                <p class="text-muted">Years of Service</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold">5,000+</h3>
                <p class="text-muted">Lives Impacted</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold">120+</h3>
                <p class="text-muted">Community Programs</p>
            </div>
            <div class="col-md-3">
                <h3 class="fw-bold">30+</h3>
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
                <h2 class="fw-bold">Who We Are</h2>
                <p class="text-muted mt-3">
                    Fragrance Of God exists to demonstrate God’s love through action.
                    We work with communities to restore hope, strengthen families,
                    empower youth, and support vulnerable individuals spiritually,
                    socially, and economically.
                </p>
                <a href="/about" class="btn btn-outline-primary mt-3">Read Our Story</a>
            </div>
        </div>
    </div>
</section>

<!-- ================= PROGRAMS ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Core Programs</h2>
            <p class="text-muted">Transforming lives through faith and service</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4">
                    <h5 class="fw-bold">Community Outreach</h5>
                    <p class="text-muted">
                        Serving vulnerable communities through food support,
                        prayer, counseling, and social programs.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4">
                    <h5 class="fw-bold">Youth & Family Empowerment</h5>
                    <p class="text-muted">
                        Equipping young people and families with values,
                        life skills, and spiritual guidance.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm p-4">
                    <h5 class="fw-bold">Faith & Discipleship</h5>
                    <p class="text-muted">
                        Encouraging spiritual growth through teachings,
                        mentorship, and prayer programs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= EVENTS ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Upcoming & Recent Events</h2>
            <p class="text-muted">Our work in action</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog-1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Community Prayer Day</h5>
                        <p class="text-muted">Bringing hope and unity through prayer.</p>
                        <small class="text-muted">📍 Kigali | 🗓 July 2025</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog-1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Youth Mentorship Camp</h5>
                        <p class="text-muted">Building faith-driven future leaders.</p>
                        <small class="text-muted">📍 Huye | 🗓 June 2025</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog-1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Family Restoration Workshop</h5>
                        <p class="text-muted">Healing families through love and guidance.</p>
                        <small class="text-muted">📍 Musanze | 🗓 May 2025</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">What People Say</h2>
            <p class="text-muted">Lives touched by Fragrance Of God</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm h-100">
                    <p class="fst-italic">
                        “Through Fragrance Of God, I found hope, faith, and a family
                        that truly cares.”
                    </p>
                    <h6 class="fw-bold mt-3 mb-0">— Grace M.</h6>
                    <small class="text-muted">Program Beneficiary</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 shadow-sm h-100">
                    <p class="fst-italic">
                        “Their commitment to faith and community transformation
                        is truly inspiring.”
                    </p>
                    <h6 class="fw-bold mt-3 mb-0">— Local Pastor</h6>
                    <small class="text-muted">Community Partner</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 shadow-sm h-100">
                    <p class="fst-italic">
                        “You don’t just hear about God’s love — you experience it.”
                    </p>
                    <h6 class="fw-bold mt-3 mb-0">— Volunteer</h6>
                    <small class="text-muted">Field Team Member</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= BLOG ================= -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Blog Post</h5>
            <h1 class="display-4">Our Latest Stories & Updates</h1>
        </div>
        <div class="row g-5">
            <!-- Blog 1 -->
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('frontend/img/blog-1.jpg') }}" alt="Empowering Girls">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="#!">Empowering Girls Through Education in Kigali</a>
                        <p class="m-0">Discover how our programs are creating opportunities for young girls to access quality education and break the cycle of poverty.</p>
                    </div>
                    <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="{{ asset('frontend/img/user1.jpg') }}" width="25" height="25" alt="">
                            <small>Jane Mukamana</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>245</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>12</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog 2 -->
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('frontend/img/blog-2.jpg') }}" alt="Health Awareness">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="#!">Community Health Awareness Campaigns</a>
                        <p class="m-0">We organize workshops and health campaigns to educate communities about nutrition, hygiene, and preventive healthcare.</p>
                    </div>
                    <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="{{ asset('frontend/img/user2.jpg') }}" width="25" height="25" alt="">
                            <small>Paul Habimana</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>310</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>18</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog 3 -->
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('frontend/img/blog-3.jpg') }}" alt="Economic Empowerment">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="#!">Economic Empowerment for Women</a>
                        <p class="m-0">Our economic empowerment programs equip women with skills and resources to start small businesses and gain financial independence.</p>
                    </div>
                    <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="{{ asset('frontend/img/user3.jpg') }}" width="25" height="25" alt="">
                            <small>Emmanuel Niyonsaba</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>198</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>9</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ================= CTA ================= -->
<section class="py-5 text-center bg-primary text-light">
    <div class="container">
        <h2 class="fw-bold">Join Us in Spreading Hope</h2>
        <p class="lead">
            Your support helps us continue transforming lives through faith and love.
        </p>
        <a href="/donate" class="btn btn-light btn-lg">Support Our Mission</a>
    </div>
</section>

@endsection
