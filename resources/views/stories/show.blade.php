@extends('layouts.app')

@section('title', $story['title'].' | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">{{ $story['title'] }}</h1>
        <p class="text-light lead mt-3">Read how our programs are transforming lives.</p>
    </div>
</section>

<!-- ================= STORY CONTENT ================= -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <img src="{{ asset('frontend/img/'.$story['img']) }}" class="img-fluid rounded shadow mb-4" alt="{{ $story['title'] }}">
                
                <div class="story-content mb-4">
                    <p class="text-muted fs-5" style="line-height:1.8;">
                        {!! $story['desc'] !!}
                    </p>
                </div>

                <!-- ================= SHARE BUTTONS ================= -->
                <div class="mb-5">
                    <h6 class="fw-bold" style="color:#ffcc00;">Share this story:</h6>
                    <div class="d-flex gap-2 mt-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($story['title']) }}" target="_blank" class="btn btn-sm btn-info text-white">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($story['title'].' '.url()->current()) }}" target="_blank" class="btn btn-sm btn-success">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                </div>

                <!-- ================= RELATED STORIES ================= -->
                @if(!empty($relatedStories))
                <div class="related-stories">
                    <h5 class="fw-bold mb-4" style="color:#ffcc00;">Related Stories</h5>
                    <div class="row g-4">
                        @foreach($relatedStories as $r)
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100 border-0 rounded-4 overflow-hidden">
                                <img src="{{ asset('frontend/img/'.$r['img']) }}" class="card-img-top" alt="{{ $r['title'] }}">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-2" style="color:#ffcc00;">
                                        <a href="{{ url('/stories/'.$r['slug']) }}" class="text-dark" style="text-decoration:none;">
                                            {{ $r['title'] }}
                                        </a>
                                    </h6>
                                    <p class="text-muted mb-0">{{ $r['short_desc'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- ================= SIDEBAR ================= -->
            <div class="col-lg-4">
                <div class="p-4 shadow-sm rounded-4 bg-light">
                    <h5 class="fw-bold mb-3" style="color:#ffcc00;">Other Stories</h5>
                    <ul class="list-unstyled">
                        @foreach ($otherStories ?? [] as $s)
                            <li class="mb-3">
                                <a href="{{ url('/stories/'.$s['slug']) }}" class="text-dark fw-bold" style="text-decoration:none;">
                                    {{ $s['title'] }}
                                </a>
                                <small class="d-block text-muted">{{ $s['short_desc'] ?? '' }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Join Us in Making a Difference</h2>
        <p class="lead mt-3">
            Your support helps us continue transforming lives through faith and love.
        </p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Support Our Mission
        </a>
    </div>
</section>

@endsection
