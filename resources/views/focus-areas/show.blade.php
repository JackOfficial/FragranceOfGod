@extends('layouts.app')

@section('title', $focusArea->title . ' | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8">
                <span class="ngo-hero-badge" style="background-color:#ffcc00; color:#111;">
                    Our Focus Area
                </span>

                <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">
                    {{ $focusArea->title }}
                </h1>

                <p class="ngo-hero-text mt-4" style="color:rgba(255, 204, 0, 0.85); max-width:700px;">
                    {{ $focusArea->excerpt ?? Str::limit(strip_tags($focusArea->description), 200) }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= OVERVIEW ================= -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Overview</h2>
                <p class="text-muted fs-5 mt-3">
                    {!! $focusArea->description !!}
                </p>
            </div>

            <div class="col-lg-6">
                @if($focusArea->image)
                    <img src="{{ asset('storage/focus-areas/' . $focusArea->image) }}"
                         class="img-fluid rounded-4 shadow"
                         alt="{{ $focusArea->title }}">
                @else
                    <img src="{{ asset('frontend/img/about.jpg') }}"
                         class="img-fluid rounded-4 shadow"
                         alt="{{ $focusArea->title }}">
                @endif
            </div>
        </div>
    </div>
</section>

<!-- ================= WHAT WE DO ================= -->
@if($focusArea->activities && count($focusArea->activities))
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">What We Do</h2>
            <p class="text-muted fs-5">
                Key activities under this focus area
            </p>
        </div>

        <div class="row g-4">
            @foreach($focusArea->activities as $activity)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                        <i class="{{ $activity->icon ?? 'fas fa-circle' }} fa-2x mb-3 text-warning"></i>
                        <h5 class="fw-bold">{{ $activity->title }}</h5>
                        <p class="text-muted">{{ $activity->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ================= IMPACT ================= -->
@if($focusArea->impact)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Our Impact</h2>
            <p class="text-muted fs-5">
                The difference this focus area is making
            </p>
        </div>

        <div class="row text-center">
            @foreach($focusArea->impact as $impact)
                <div class="col-md-4">
                    <h3 class="fw-bold" style="color:#ffcc00;">{{ $impact['value'] }}</h3>
                    <p class="text-muted">{{ $impact['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ================= RELATED STORIES ================= -->
@if($focusArea->stories && $focusArea->stories->count())
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Stories From the Field</h2>
            <p class="text-muted">
                Real lives, real impact
            </p>
        </div>

        <div class="row g-4">
            @foreach($focusArea->stories as $story)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('storage/stories/' . ($story->image ?? 'default.jpg')) }}" class="card-img-top" alt="{{ $story->title }}">
                        <div class="card-body">
                            <h6 class="fw-bold">{{ $story->title }}</h6>
                            <p class="text-muted small">{{ Str::limit($story->excerpt, 80) }}</p>
                            <a href="{{ route('stories.show', $story->slug) }}" class="text-warning fw-semibold">Read Story →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Support This Focus Area</h2>
        <p class="lead mt-3">
            Your generosity helps us continue serving communities
            with compassion and faith.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="/donate" class="btn btn-lg"
               style="background-color:#ffcc00; color:#111; font-weight:600;">
                Donate Now
            </a>
            <a href="/contact" class="btn btn-outline-light btn-lg"
               style="border-color:#ffcc00; color:#ffcc00;">
                Get Involved
            </a>
        </div>
    </div>
</section>

@endsection
