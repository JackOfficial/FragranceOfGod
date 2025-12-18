@extends('layouts.app')

@section('title', $blog['title'].' | Fragrance Of God')
@section('meta_description', $blog['short_desc'] ?? 'Read stories of hope, impact, and transformation from Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">{{ $blog['title'] }}</h1>
        <p class="text-light lead mt-3">Discover how our work is impacting lives.</p>
    </div>
</section>

<!-- ================= BLOG CONTENT ================= -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            
            <!-- Main Content -->
            <div class="col-lg-8">
                <img src="{{ asset('frontend/img/'.$blog['img']) }}" class="img-fluid rounded shadow mb-4" alt="{{ $blog['title'] }}">

                <div class="story-content">
                    <p class="text-muted fs-5" style="line-height:1.8;">
                        {!! $blog['desc'] !!}
                    </p>
                </div>

                <!-- Social Share Buttons -->
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <span class="fw-bold me-2">Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-primary btn-sm">
                        <i class="fab fa-facebook-f me-1"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($blog['title']) }}" target="_blank" class="btn btn-info btn-sm">
                        <i class="fab fa-twitter me-1"></i> Twitter
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog['title'].' '.url()->current()) }}" target="_blank" class="btn btn-success btn-sm">
                        <i class="fab fa-whatsapp me-1"></i> WhatsApp
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="p-4 shadow-sm rounded-4 bg-light mb-4">
                    <h5 class="fw-bold mb-3" style="color:#ffcc00;">Related Stories</h5>
                    <ul class="list-unstyled">
                        @foreach ($relatedBlogs ?? [] as $related)
                        <li class="mb-3">
                            <a href="{{ url('/blogs/'.$related['slug']) }}" class="text-dark fw-bold" style="text-decoration:none;">
                                {{ $related['title'] }}
                            </a>
                            <small class="d-block text-muted">{{ $related['short_desc'] ?? '' }}</small>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="p-4 shadow-sm rounded-4 bg-light">
                    <h5 class="fw-bold mb-3" style="color:#ffcc00;">Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-dark" style="text-decoration:none;">Community Outreach</a></li>
                        <li><a href="#" class="text-dark" style="text-decoration:none;">Youth & Family Empowerment</a></li>
                        <li><a href="#" class="text-dark" style="text-decoration:none;">Faith & Discipleship</a></li>
                        <li><a href="#" class="text-dark" style="text-decoration:none;">Health & Well-Being</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Support Our Mission</h2>
        <p class="lead mt-3">Your help allows us to transform more lives through faith, hope, and action.</p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">Donate Now</a>
    </div>
</section>

@endsection
