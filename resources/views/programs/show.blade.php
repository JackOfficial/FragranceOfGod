@extends('layouts.app')

@section('title', $program['title'].' | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:380px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title" style="color:#ffcc00;">
            {{ $program['title'] }}
        </h1>
    </div>
</section>

<!-- ================= CONTENT ================= -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- MAIN -->
            <div class="col-lg-8">
                <div class="fs-5 text-muted" style="line-height:1.8;">
                    {!! $program['description'] !!}
                </div>

                <h4 class="fw-bold mt-4" style="color:#ffcc00;">Program Objectives</h4>
                <ul class="text-muted fs-5 mt-3">
                    @foreach($program['objectives'] as $obj)
                        <li>{{ $obj }}</li>
                    @endforeach
                </ul>

                <!-- CTA -->
                <div class="mt-5 p-4 rounded-4" style="background:#111; color:#ffcc00;">
                    <h4 class="fw-bold">Support This Program</h4>
                    <p class="mt-2">
                        Help us expand this program and reach more lives.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="/donate" class="btn" style="background:#ffcc00; color:#111; font-weight:600;">
                            Donate
                        </a>
                        <a href="/volunteers/signup" class="btn btn-outline-light">
                            Volunteer
                        </a>
                    </div>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <div class="p-4 bg-light shadow-sm rounded-4">
                    <h5 class="fw-bold mb-3" style="color:#ffcc00;">Other Programs</h5>

                    @foreach($relatedPrograms as $rel)
                        <a href="{{ route('programs.show', $rel['slug']) }}"
                           class="d-block mb-3 fw-bold text-decoration-none text-dark">
                            {{ $rel['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
