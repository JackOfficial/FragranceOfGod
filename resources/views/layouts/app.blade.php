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
    <link rel="icon" href="{{ asset('frontend/img/Fog.jpg') }}" type="image/png">

    <!-- ================= BOOTSTRAP 5 ================= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ================= ICONS ================= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ================= CUSTOM CSS ================= -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @stack('styles')

    <style>
        /* ===================== BRAND COLORS ===================== */
        :root {
            --brand-gold: #ffcc00;
            --brand-black: #111;
            --brand-red: #d32f2f;
        }

        /* ===================== NAVBAR ===================== */
        .navbar {
            background-color: var(--brand-gold);
        }

        .navbar .nav-link {
            color: var(--brand-black);
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--brand-red) !important;
        }

        .navbar .btn-donate {
            background-color: var(--brand-black);
            color: var(--brand-gold);
            font-weight: 600;
            transition: 0.3s;
        }

        .navbar .btn-donate:hover {
            background-color: var(--brand-red);
            color: #fff;
        }

        .navbar-toggler {
            border-color: var(--brand-black);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(17,17,17)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/ %3E%3C/svg%3E");
        }

        /* ===================== NGO HERO ===================== */
        .ngo-hero {
            min-height: 88vh;
            background-image: url("{{ asset('frontend/img/banner.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
            overflow: hidden;
            position: relative;
        }

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

        .ngo-hero .container {
            z-index: 2;
            position: relative;
        }

        .ngo-hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.9);
            color: var(--brand-black);
            padding: 8px 18px;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 50px;
            letter-spacing: 0.5px;
        }

        .ngo-hero-title {
            font-size: clamp(2.4rem, 5vw, 3.6rem);
            font-weight: 800;
            line-height: 1.2;
        }

        .ngo-hero-text {
            font-size: 1.15rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.9);
            max-width: 620px;
        }

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

        @media (max-width: 768px) {
            .ngo-hero {
                min-height: 92vh;
                text-align: left;
            }
        }

        /* ===================== FOOTER ===================== */
        .bg-dark {
            background-color: var(--brand-black) !important;
        }

        .text-primary {
            color: var(--brand-gold) !important;
        }

        .btn-primary {
            background-color: var(--brand-gold);
            color: var(--brand-black);
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--brand-red);
            color: #fff;
        }

         /* Hover effect for program cards */
    .card:hover .program-hover {
        opacity: 1;
    }

    /* Icon circle hover scale */
    .card:hover .icon-circle {
        transform: scale(1.1);
        transition: transform 0.3s;
    }
    </style>
</head>
<body>

<!-- Topbar Start -->
<div class="container-fluid py-2 border-bottom d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-decoration-none text-body pe-3" href="#!"><i class="bi bi-telephone me-2"></i>+256 751 231644</a>
                    <span class="text-body">|</span>
                    <a class="text-decoration-none text-body px-3" href="#!"><i class="bi bi-envelope me-2"></i>info@fragranceofgod.org</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-body px-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="text-body px-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-body px-2" href="#!"><i class="fab fa-instagram"></i></a>
                    <a class="text-body ps-2" href="#!"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('frontend/img/Fog Logo.png') }}" alt="Fragrance Of God Logo" style="width:150px; height:auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('focus-areas') ? 'active' : '' }}" href="/focus-areas">Focus Areas</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('programs') ? 'active' : '' }}" href="/programs">Programs</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('stories') ? 'active' : '' }}" href="/stories">Events</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('events') ? 'active' : '' }}" href="/events">Events</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('blogs') ? 'active' : '' }}" href="/blogs">Blog</a></li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-donate btn-sm px-4" href="/donate">Donate</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Page Content -->
<main>
    @yield('content')
</main>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 py-5">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                    Get In Touch</h4>
                <p class="mb-4">
                    Fragrance Of God NGO is committed to uplifting communities and transforming lives through education, health, and economic empowerment.
                </p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Kampala, Uganda</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@fragranceofgod.org</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+256 751 231644</p>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                    Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="/"><i class="fa fa-angle-right me-2"></i>Home</a>
                    <a class="text-light mb-2" href="/about"><i class="fa fa-angle-right me-2"></i>About Us</a>
                    <a class="text-light mb-2" href="/projects"><i class="fa fa-angle-right me-2"></i>Our Projects</a>
                    <a class="text-light mb-2" href="/team"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
                    <a class="text-light mb-2" href="/blog"><i class="fa fa-angle-right me-2"></i>Blog & Stories</a>
                    <a class="text-light" href="/contact"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                </div>
            </div>

            <!-- Popular Links -->
            <div class="col-lg-3 col-md-6">
                <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                    Popular Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="/donate"><i class="fa fa-angle-right me-2"></i>Donate</a>
                    <a class="text-light mb-2" href="/volunteer"><i class="fa fa-angle-right me-2"></i>Volunteer</a>
                    <a class="text-light mb-2" href="/events"><i class="fa fa-angle-right me-2"></i>Events</a>
                    <a class="text-light mb-2" href="/testimonials"><i class="fa fa-angle-right me-2"></i>Testimonials</a>
                    <a class="text-light mb-2" href="/gallery"><i class="fa fa-angle-right me-2"></i>Gallery</a>
                    <a class="text-light" href="/faq"><i class="fa fa-angle-right me-2"></i>FAQs</a>
                </div>
            </div>

            <!-- Newsletter + Socials -->
            <div class="col-lg-3 col-md-6">
                <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                    Newsletter</h4>
                <form action="/subscribe" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="form-control p-3 border-0" placeholder="Your Email Address" required>
                        <button class="btn btn-primary" type="submit">Sign Up</button>
                    </div>
                </form>
                <h6 class="text-primary text-uppercase mt-4 mb-3">Follow Us</h6>
                <div class="d-flex">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="/">Fragrance Of God NGO</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-primary" href="#" target="_blank">Tonny Jack</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- ================= SCRIPTS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
