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
</head>
<body>

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

                <form action="/subscribe" method="POST" class="d-flex">
                    @csrf
                    <input type="email" name="email" class="form-control form-control-sm me-2"
                           placeholder="Your email address" required>
                    <button class="btn btn-primary btn-sm">Subscribe</button>
                </form>
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
