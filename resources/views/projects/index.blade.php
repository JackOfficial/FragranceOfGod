@extends('layouts.app')

@section('title', 'Our Projects | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Our Projects</h1>
        <p class="text-light lead mt-3">Discover how we are transforming lives and communities</p>
    </div>
</section>

<!-- ================= PROJECTS GRID ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('frontend/img/'.$project['img']) }}" class="card-img-top" alt="{{ $project['title'] }}">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3" style="color:#ffcc00;">{{ $project['title'] }}</h5>
                            <p class="text-muted">{{ $project['short_desc'] }}</p>
                            <a href="{{ url('/projects/'.$project['slug']) }}" class="btn btn-outline-dark" style="border-color:#ffcc00; color:#ffcc00;">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
