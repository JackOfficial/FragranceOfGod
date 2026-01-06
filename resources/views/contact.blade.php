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
<livewire:contact-component />

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Partner With Us</h2>
        <p class="lead mt-3">Support our mission and help transform lives in communities across Rwanda.</p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">Donate Now</a>
    </div>
</section>

@endsection
