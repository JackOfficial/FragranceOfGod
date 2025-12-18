@extends('layouts.app')

@section('title', $event['title'].' | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">{{ $event['title'] }}</h1>
        <p class="text-light lead mt-3">Discover how this event is making an impact</p>
    </div>
</section>

<!-- ================= EVENT CONTENT ================= -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8">
                <img src="{{ asset('frontend/img/'.$event['img']) }}" class="img-fluid rounded shadow mb-4" alt="{{ $event['title'] }}">

                <div class="event-content">
                    <p class="text-muted fs-5" style="line-height:1.8;">
                        {!! $event['desc'] !!}
                    </p>

                    <div class="mt-4">
                        <p class="fw-bold" style="color:#ffcc00;">Event Details:</p>
                        <ul class="list-unstyled text-muted">
                            <li>📍 Location: {{ $event['location'] }}</li>
                            <li>🗓 Date: {{ $event['date'] }}</li>
                        </ul>
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-4">
                        <p class="fw-bold" style="color:#ffcc00;">Share This Event:</p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-primary">
                                <i class="fab fa-facebook-f me-2"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event['title']) }}" target="_blank" class="btn btn-info text-white">
                                <i class="fab fa-twitter me-2"></i> Twitter
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($event['title'].' '.url()->current()) }}" target="_blank" class="btn btn-success">
                                <i class="fab fa-whatsapp me-2"></i> WhatsApp
                            </a>
                            <a href="mailto:?subject={{ urlencode($event['title']) }}&body={{ urlencode(url()->current()) }}" class="btn btn-secondary">
                                <i class="fas fa-envelope me-2"></i> Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="p-4 shadow-sm rounded-4 bg-light">
                    <h5 class="fw-bold mb-3" style="color:#ffcc00;">Related Events</h5>
                    <ul class="list-unstyled">
                        @foreach ($relatedEvents ?? [] as $rel)
                            <li class="mb-3">
                                <a href="{{ url('/events/'.$rel['slug']) }}" class="text-dark fw-bold" style="text-decoration:none;">
                                    {{ $rel['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- CTA Sidebar -->
                <div class="p-4 shadow-sm rounded-4 bg-warning text-dark mt-4 text-center">
                    <h6 class="fw-bold mb-3">Join Our Next Event</h6>
                    <p class="mb-3">Be part of transforming lives and communities through faith and action.</p>
                    <a href="/donate" class="btn btn-dark btn-lg">Support Our Work</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Participate & Make a Difference</h2>
        <p class="lead mt-3">Your involvement empowers communities and spreads hope worldwide.</p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Support Our Mission
        </a>
    </div>
</section>

@endsection
