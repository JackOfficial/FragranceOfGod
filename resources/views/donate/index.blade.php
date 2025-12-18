@extends('layouts.app')

@section('title', 'Donate | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Support Our Mission</h1>
        <p class="text-light lead mt-3">Your generosity helps us transform lives and communities.</p>
    </div>
</section>

<!-- ================= DONATION INFO ================= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Make a Difference Today</h2>
            <p class="text-muted fs-5 mt-3">
                Every donation helps us provide essential services, empower communities,
                and nurture spiritual growth. Choose an amount and join our mission.
            </p>
        </div>

        <!-- Donation Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="p-4 shadow-sm rounded-4 bg-light">
                    <form action="{{ url('/donate/process') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="donor_name" class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control" id="donor_name" name="donor_name" placeholder="Your full name" required>
                        </div>

                        <div class="mb-4">
                            <label for="donor_email" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control" id="donor_email" name="donor_email" placeholder="Your email" required>
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="form-label fw-bold">Donation Amount (USD)</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" min="1" required>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold">Message (Optional)</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Any message you'd like to share"></textarea>
                        </div>

                        <button type="submit" class="btn btn-lg w-100" style="background-color:#ffcc00; color:#111; font-weight:600;">
                            Donate Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= WHY DONATE ================= -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold" style="color:#ffcc00;">Why Your Support Matters</h2>
        <p class="text-muted fs-5 mt-3 mb-5">
            Your contribution helps us implement programs that restore hope, uplift communities,
            empower youth, strengthen families, and promote spiritual growth.
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm rounded-4">
                    <i class="fas fa-hands-helping fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-2">Community Outreach</h5>
                    <p class="text-muted">Support food drives, relief efforts, and social programs for the most vulnerable.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm rounded-4">
                    <i class="fas fa-users fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-2">Youth & Family Empowerment</h5>
                    <p class="text-muted">Equip young people and families with mentorship, skills, and spiritual guidance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm rounded-4">
                    <i class="fas fa-praying-hands fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-2">Faith & Discipleship</h5>
                    <p class="text-muted">Enable discipleship programs, prayer initiatives, and spiritual growth opportunities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Your Generosity Transforms Lives</h2>
        <p class="lead mt-3">Together, we can make a lasting impact in our communities and the world.</p>
        <a href="#donate-form" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Donate Now
        </a>
    </div>
</section>

@endsection
