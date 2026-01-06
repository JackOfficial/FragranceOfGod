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
                        {{-- Display first image as main --}}
                        @php
                            $images = $project->media->where('file_type', 'image');
                            $coverImage = $images->first();
                        @endphp

                        @if($coverImage)
                            <img src="{{ asset('storage/'.$coverImage->file_path) }}" class="card-img-top" alt="{{ $project->title }}">
                        @else
                            <img src="{{ asset('frontend/img/default-project.jpg') }}" class="card-img-top" alt="{{ $project->title }}">
                        @endif

                        <div class="card-body">
                            <h5 class="fw-bold mb-3" style="color:#ffcc00;">{{ $project->title }}</h5>
                            <p class="text-muted">{{ $project->short_desc }}</p>

                            {{-- Optional: Show stacked images like Facebook --}}
                            @if($images->count() > 1)
                                <div class="d-flex mt-2">
                                    @foreach($images->skip(1)->take(3) as $img)
                                        <img src="{{ asset('storage/'.$img->file_path) }}" 
                                             class="rounded-circle border border-white me-1" 
                                             style="width:35px; height:35px; object-fit:cover;">
                                    @endforeach
                                    @if($images->count() > 4)
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" 
                                             style="width:35px; height:35px; font-size:12px;">
                                            +{{ $images->count() - 4 }}
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <a href="{{ url('/projects/'.$project->slug) }}" class="btn btn-outline-dark mt-3" style="border-color:#ffcc00; color:#ffcc00;">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@endsection
