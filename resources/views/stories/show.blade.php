@extends('layouts.app')

@section('title', $story->title.' | Fragrance Of God')

@section('content')

@php
    $coverImage = $story->media->firstWhere('file_type', 'image');
@endphp

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">
            {{ $story->title }}
        </h1>
        <p class="text-light lead mt-3">
            A story of faith, compassion, and transformed lives.
        </p>
    </div>
</section>

<!-- ================= STORY CONTENT ================= -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- ================= MAIN CONTENT ================= -->
            <div class="col-lg-8">

                <!-- Cover Image -->
                <img
                    src="{{ $coverImage ? asset('storage/'.$coverImage->file_path) : asset('frontend/img/default-story.jpg') }}"
                    class="img-fluid rounded shadow mb-4"
                    alt="{{ $story->title }}">

                <!-- Meta -->
                <div class="d-flex flex-wrap gap-3 mb-4 text-muted">
                    <span>
                        <i class="fas fa-user me-1"></i>
                        {{ $story->author->name ?? 'HFRO Team' }}
                    </span>
                    <span>
                        <i class="fas fa-calendar-alt me-1"></i>
                        {{ $story->created_at->format('d M, Y') }}
                    </span>
                </div>

                <!-- Story Body -->
                <div class="story-content mb-5 fs-5" style="line-height:1.8;">
                    {!! $story->description !!}
                </div>

                <!-- ================= SHARE BUTTONS ================= -->
                <div class="mb-5">
                    <h6 class="fw-bold mb-2" style="color:#ffcc00;">Share this story:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                           target="_blank"
                           class="btn btn-sm btn-primary">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($story->title) }}"
                           target="_blank"
                           class="btn btn-sm btn-info text-white">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>

                        <a href="https://wa.me/?text={{ urlencode($story->title.' '.url()->current()) }}"
                           target="_blank"
                           class="btn btn-sm btn-success">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>

                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}"
                           target="_blank"
                           class="btn btn-sm btn-primary">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                </div>

                <!-- ================= RELATED STORIES ================= -->
                @if($relatedStories->count())
                <div class="related-stories">
                    <h5 class="fw-bold mb-4" style="color:#ffcc00;">Related Stories</h5>
                    <div class="row g-4">
                        @foreach($relatedStories as $related)
                            @php
                                $relatedImage = $related->media->firstWhere('file_type', 'image');
                            @endphp

                            <div class="col-md-6">
                                <div class="card shadow-sm h-100 border-0 rounded-4 overflow-hidden">
                                    <img
                                        src="{{ $relatedImage ? asset('storage/'.$relatedImage->file_path) : asset('frontend/img/default-story.jpg') }}"
                                        class="card-img-top"
                                        style="height:180px; object-fit:cover"
                                        alt="{{ $related->title }}">

                                    <div class="card-body">
                                        <h6 class="fw-bold mb-2">
                                            <a href="{{ route('stories.show', $related->slug) }}"
                                               class="text-dark text-decoration-none">
                                                {{ $related->title }}
                                            </a>
                                        </h6>
                                        <p class="text-muted mb-0">
                                            {{ Str::limit(strip_tags($related->description), 80) }}
                                        </p>
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
                        @foreach ($otherStories as $s)
                            <li class="mb-3">
                                <a href="{{ route('stories.show', $s->slug) }}"
                                   class="fw-bold text-dark text-decoration-none">
                                    {{ $s->title }}
                                </a>
                                <small class="d-block text-muted">
                                    {{ $s->created_at->format('d M, Y') }}
                                </small>
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
        <a href="/donate"
           class="btn btn-lg"
           style="background-color:#ffcc00; color:#111; font-weight:600;">
            Support Our Mission
        </a>
    </div>
</section>

@endsection
