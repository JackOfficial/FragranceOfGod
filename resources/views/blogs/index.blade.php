@extends('layouts.app')

@section('title', 'Our Stories & Updates | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Our Stories & Updates</h1>
        <p class="text-light lead mt-3">
            Discover how our programs are transforming lives and communities.
        </p>
    </div>
</section>

<!-- ================= BLOG GRID ================= -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ asset('frontend/img/'.$blog['img']) }}" class="card-img-top" alt="{{ $blog['title'] }}">
                    <div class="p-4">
                        <a href="{{ url('/blogs/'.$blog['slug']) }}" class="h5 fw-bold d-block mb-2 text-dark">
                            {{ $blog['title'] }}
                        </a>
                        <p class="text-muted">{{ $blog['short_desc'] }}</p>
                        <small class="text-muted">By {{ $blog['author'] }} | {{ \Carbon\Carbon::parse($blog['date'])->format('M d, Y') }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
