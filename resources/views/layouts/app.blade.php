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

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>

                <!-- About -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('about*') ? 'active' : '' }}"
                       href="#" role="button" data-bs-toggle="dropdown">
                        About
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/about">Who We Are</a></li>
                        <li><a class="dropdown-item" href="/about#mission">Mission & Values</a></li>
                        <li><a class="dropdown-item" href="/team">Leadership</a></li>
                    </ul>
                </li>

                <!-- Our Work -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('focus-areas*') || request()->is('programs*') || request()->is('projects*') ? 'active' : '' }}"
                       href="#" role="button" data-bs-toggle="dropdown">
                        Our Work
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/focus-areas">Focus Areas</a></li>
                        <li><a class="dropdown-item" href="/programs">Programs</a></li>
                        <li><a class="dropdown-item" href="/projects">Projects</a></li>
                    </ul>
                </li>

                <!-- Stories -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('stories*') ? 'active' : '' }}" href="/stories">
                        Stories
                    </a>
                </li>

                <!-- Get Involved -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('volunteers*') ? 'active' : '' }}"
                       href="#" role="button" data-bs-toggle="dropdown">
                        Get Involved
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/volunteers">Volunteer</a></li>
                        <li><a class="dropdown-item" href="/partner">Partner With Us</a></li>
                    </ul>
                </li>

                <!-- Events -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('events*') ? 'active' : '' }}" href="/events">
                        Events
                    </a>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="/contact">
                        Contact
                    </a>
                </li>

                <!-- Donate Button -->
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-donate btn-sm px-4" href="/donate">
                        Donate
                    </a>
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
<footer class="bg-dark text-light mt-5">

    <!-- Main Footer -->
    <div class="container py-5">
        <div class="row g-5">

            <!-- About NGO -->
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('frontend/img/Fog Logo.png') }}" alt="Fragrance Of God Logo" style="width:140px;" class="mb-3">
                <p class="small">
                    Fragrance Of God is a faith-based non-profit organization committed to transforming lives
                    through community outreach, education, health, and spiritual empowerment.
                </p>

                <div class="d-flex mt-3">
                    <a class="btn btn-sm btn-primary rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm btn-primary rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm btn-primary rounded-circle me-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-sm btn-primary rounded-circle" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Our Work -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-primary mb-4">Our Work</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a class="text-light text-decoration-none" href="/focus-areas">Focus Areas</a></li>
                    <li class="mb-2"><a class="text-light text-decoration-none" href="/programs">Programs</a></li>
                    <li class="mb-2"><a class="text-light text-decoration-none" href="/projects">Projects</a></li>
                    <li><a class="text-light text-decoration-none" href="/stories">Impact Stories</a></li>
                </ul>
            </div>

            <!-- Get Involved -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-primary mb-4">Get Involved</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a class="text-light text-decoration-none" href="/volunteers">Volunteer</a></li>
                    <li class="mb-2"><a class="text-light text-decoration-none" href="/donate">Donate</a></li>
                    <li class="mb-2"><a class="text-light text-decoration-none" href="/events">Events</a></li>
                    <li><a class="text-light text-decoration-none" href="/contact">Partner With Us</a></li>
                </ul>
            </div>

            <!-- Contact & Newsletter -->
            <div class="col-lg-4 col-md-6">
                <h5 class="text-primary mb-4">Stay Connected</h5>

                <p class="small mb-2">
                    <i class="fa fa-map-marker-alt me-2 text-primary"></i>Kampala, Uganda
                </p>
                <p class="small mb-2">
                    <i class="fa fa-envelope me-2 text-primary"></i>info@fragranceofgod.org
                </p>
                <p class="small mb-4">
                    <i class="fa fa-phone-alt me-2 text-primary"></i>+256 751 231644
                </p>

                <livewire:subscribe-component />
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-top border-secondary">
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start small">
                    © {{ date('Y') }} Fragrance Of God NGO. All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end small">
                    Designed with ❤️ for community impact
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- Footer End -->


<!-- ================= SCRIPTS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
