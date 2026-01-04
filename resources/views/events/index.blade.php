@extends('layouts.app')

@section('title', 'Events | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Our Events</h1>
        <p class="text-light lead mt-3">See how Fragrance Of God is making an impact in communities</p>
    </div>
</section>

<!-- ================= UPCOMING & PAST EVENTS ================= -->
<section class="py-5">
    <div class="container">
        <!-- Upcoming Events -->
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#ffcc00;">Upcoming Events</h2>
            <p class="text-muted">Join us and be part of our initiatives</p>
        </div>

        <div class="row g-4">
            @forelse ($upcomingEvents as $event)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        @php
                            $firstImage = $event->media->where('file_type', 'image')->first();
                        @endphp
                        <img src="{{ $firstImage ? asset('storage/'.$firstImage->file_path) : asset('frontend/img/default-event.jpg') }}" 
                             class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="fw-bold" style="color:#ffcc00;">{{ $event->title }}</h5>
                            <p class="text-muted">{!! Str::limit(strip_tags($event->description), 100) !!}</p>
                            <small class="text-muted">📍 {{ $event->location }} | 🗓 {{ $event->event_date->format('d M, Y') }} | ⏰ {{ $event->event_time ?? 'TBA' }}</small>
                            <a href="{{ url('/events/'.$event->slug) }}" class="d-block mt-2 text-primary fw-bold">Read More →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No upcoming events.</div>
            @endforelse
        </div>

        <!-- Past Events -->
        <div class="text-center mt-5 mb-4">
            <h2 class="fw-bold" style="color:#ffcc00;">Past Events</h2>
            <p class="text-muted">See the impact we've made</p>
        </div>

        <div class="row g-4">
            @forelse ($pastEvents as $event)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        @php
                            $firstImage = $event->media->where('file_type', 'image')->first();
                        @endphp
                        <img src="{{ $firstImage ? asset('storage/'.$firstImage->file_path) : asset('frontend/img/default-event.jpg') }}" 
                             class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="fw-bold" style="color:#ffcc00;">{{ $event->title }}</h5>
                            <p class="text-muted">{!! Str::limit(strip_tags($event->description), 100) !!}</p>
                            <small class="text-muted">📍 {{ $event->location }} | 🗓 {{ $event->event_date->format('d M, Y') }} | ⏰ {{ $event->event_time ?? 'TBA' }}</small>
                            <a href="{{ url('/events/'.$event->slug) }}" class="d-block mt-2 text-primary fw-bold">Read More →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No past events.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Be Part of Our Next Event</h2>
        <p class="lead mt-3">Your participation helps us reach more communities and transform more lives.</p>
        <a href="/donate" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Support Our Work
        </a>
    </div>
</section>

@endsection
