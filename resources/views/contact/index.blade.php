@extends('layouts.app')

@section('title', 'Contact Us | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:350px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Contact Us</h1>
        <p class="text-light lead mt-3">We are here to hear from you. Reach out to us today.</p>
    </div>
</section>

<!-- ================= CONTACT FORM ================= -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Send Us a Message</h2>
                @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
                <form action="{{ route('contact.send') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message</label>
                        <textarea name="message" class="form-control" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">Send Message</button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Get in Touch</h2>
                <p class="text-muted fs-5 mt-3">
                    Have questions or want to learn more about our programs? Reach us via phone, email, or visit our office.
                </p>

                <ul class="list-unstyled mt-4">
                    <li class="mb-3"><i class="fas fa-map-marker-alt me-2 text-warning"></i> Kigali, Rwanda</li>
                    <li class="mb-3"><i class="fas fa-phone me-2 text-warning"></i> +250 788 123 456</li>
                    <li class="mb-3"><i class="fas fa-envelope me-2 text-warning"></i> info@fragranceofgod.org</li>
                </ul>

                <!-- Optional: Embed Google Map -->
                <div class="mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!..." width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Partner With Us</h2>
        <p class="lead mt-3">Support our mission and help transform lives in communities across Rwanda.</p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">Donate Now</a>
    </div>
</section>

@endsection
