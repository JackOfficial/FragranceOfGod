@extends('layouts.app')

@section('title', 'Fragrance Of God | Faith, Compassion & Community Impact')

@section('content')

<!-- ================= HERO ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold display-5">
                    Spreading the Fragrance of God Through Love & Service
                </h1>
                <p class="lead text-muted mt-3">
                    Fragrance Of God is a faith-driven non-profit organization committed
                    to restoring hope, dignity, and purpose through compassion,
                    community service, and spiritual empowerment.
                </p>
                <div class="mt-4">
                    <a href="/donate" class="btn btn-primary btn-lg me-2">Donate Now</a>
                    <a href="/about" class="btn btn-outline-dark btn-lg">Learn More</a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('frontend/img/hero.jpg') }}" class="img-fluid rounded shadow" alt="Fragrance Of God NGO">
            </div>
        </div>
    </div>
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
                    <img src="{{ asset('frontend/img/event1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Community Prayer Day</h5>
                        <p class="text-muted">Bringing hope and unity through prayer.</p>
                        <small class="text-muted">📍 Kigali | 🗓 July 2025</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/event2.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Youth Mentorship Camp</h5>
                        <p class="text-muted">Building faith-driven future leaders.</p>
                        <small class="text-muted">📍 Huye | 🗓 June 2025</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/event3.jpg') }}" class="card-img-top">
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
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Latest News & Insights</h2>
            <p class="text-muted">Stories, reflections, and updates</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Living Out Faith Through Service</h5>
                        <p class="text-muted">How love in action transforms communities.</p>
                        <a href="#" class="fw-bold text-primary">Read More →</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog2.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Why Community Matters</h5>
                        <p class="text-muted">Faith grows stronger together.</p>
                        <a href="#" class="fw-bold text-primary">Read More →</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('frontend/img/blog3.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Restoring Hope One Life at a Time</h5>
                        <p class="text-muted">Stories from the field.</p>
                        <a href="#" class="fw-bold text-primary">Read More →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
