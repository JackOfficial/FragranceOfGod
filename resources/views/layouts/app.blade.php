<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ================= META ================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Fragrance Of God | Faith & Community Impact')</title>

    <meta name="description" content="@yield('meta_description', 'Fragrance Of God is a faith-based non-profit organization dedicated to spreading hope, love, and community transformation.')">
    <meta name="keywords" content="@yield('meta_keywords', 'NGO, faith-based organization, community outreach, charity, ministry')">
    <meta name="author" content="Fragrance Of God">

    <!-- ================= OPEN GRAPH ================= -->
    <meta property="og:title" content="@yield('title', 'Fragrance Of God')">
    <meta property="og:description" content="@yield('meta_description', 'Spreading the fragrance of God through love and service.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('frontend/img/og-image.jpg'))">

    <!-- ================= FAVICON ================= -->
    <link rel="icon" href="{{ asset('frontend/img/favicon.png') }}" type="image/png">

    <!-- ================= BOOTSTRAP 5 ================= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ================= ICONS ================= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ================= CUSTOM CSS ================= -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @stack('styles')
</head>
 <style>
    /* ==================================================
   NGO HERO BANNER – 2025 PREMIUM STYLE
   ================================================== */

.ngo-hero {
    min-height: 88vh;
    background-image: url("../img/hero-banner.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #ffffff;
    overflow: hidden;
}

/* Dark elegant overlay for readability */
.ngo-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(0, 0, 0, 0.70) 0%,
        rgba(0, 0, 0, 0.45) 45%,
        rgba(0, 0, 0, 0.20) 100%
    );
    z-index: 1;
}

/* Keep content above overlay */
.ngo-hero .container {
    z-index: 2;
}

/* Badge */
.ngo-hero-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.9);
    color: #111;
    padding: 8px 18px;
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 50px;
    letter-spacing: 0.5px;
}

/* Main title */
.ngo-hero-title {
    font-size: clamp(2.4rem, 5vw, 3.6rem);
    font-weight: 800;
    line-height: 1.2;
}

/* Description text */
.ngo-hero-text {
    font-size: 1.15rem;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.9);
    max-width: 620px;
}

/* Bottom curved separator */
.ngo-hero-shape {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    height: 90px;
    background: #ffffff;
    border-top-left-radius: 50% 100%;
    border-top-right-radius: 50% 100%;
    z-index: 2;
}

/* Mobile spacing adjustments */
@media (max-width: 768px) {
    .ngo-hero {
        min-height: 92vh;
        text-align: left;
    }
}

 </style>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            Fragrance Of God
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active fw-bold' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('programs') ? 'active fw-bold' : '' }}" href="/programs">Programs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('events') ? 'active fw-bold' : '' }}" href="/events">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blogs') ? 'active fw-bold' : '' }}" href="/blogs">Blog</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-primary btn-sm px-4" href="/donate">
                        Donate
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ================= PAGE CONTENT ================= -->
<main>
    @yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="bg-dark text-light pt-5 mt-5">
    <div class="container">
        <div class="row g-4 pb-4">

            <div class="col-md-4">
                <h5 class="fw-bold">Fragrance Of God</h5>
                <p class="small">
                    A faith-based non-profit organization committed to spreading
                    hope, love, and transformation through service and compassion.
                </p>
            </div>

            <div class="col-md-2">
                <h6 class="fw-bold">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="/about" class="text-light text-decoration-none">About Us</a></li>
                    <li><a href="/programs" class="text-light text-decoration-none">Programs</a></li>
                    <li><a href="/events" class="text-light text-decoration-none">Events</a></li>
                    <li><a href="/blogs" class="text-light text-decoration-none">Blog</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold">Get Involved</h6>
                <ul class="list-unstyled small">
                    <li><a href="/donate" class="text-light text-decoration-none">Donate</a></li>
                    <li><a href="/volunteer" class="text-light text-decoration-none">Volunteer</a></li>
                    <li><a href="/partner" class="text-light text-decoration-none">Partner With Us</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold">Contact</h6>
                <p class="small mb-1">📍 Rwanda</p>
                <p class="small mb-1">📧 info@fragranceofgod.org</p>
                <p class="small">📞 +250 XXX XXX XXX</p>

                <div class="mt-2">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

        </div>

        <div class="border-top border-secondary pt-3 text-center small">
            © {{ date('Y') }} Fragrance Of God. All Rights Reserved.
        </div>
    </div>
</footer>

<!-- ================= SCRIPTS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
