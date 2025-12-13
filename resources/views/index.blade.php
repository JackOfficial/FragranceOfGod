<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Happy Family Rwanda Organization | Empowering Girls & Families</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Happy Family Rwanda Organization (HFRO) empowers girls and families through education, advocacy, and community engagement to prevent gender-based violence and teenage pregnancy.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>

<!-- TOP BAR -->
<div class="container-fluid py-2 border-bottom d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <small class="me-3"><i class="bi bi-telephone"></i> +250 XXX XXX XXX</small>
                <small><i class="bi bi-envelope"></i> info@hfro.org</small>
            </div>
            <div class="col-md-6 text-end">
                <a href="#" class="text-dark me-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-dark me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-dark"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
            HFRO
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="/programs">Our Programs</a></li>
                <li class="nav-item"><a class="nav-link" href="/impact">Impact</a></li>
                <li class="nav-item"><a class="nav-link" href="/stories">News & Stories</a></li>
                <li class="nav-item">
                    <a class="btn btn-primary ms-lg-3" href="/donate">Donate Now</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="bg-primary text-white py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">
                    Empowering Girls. Strengthening Families. Transforming Communities.
                </h1>
                <p class="lead mt-3">
                    Happy Family Rwanda Organization works to prevent gender-based violence and teenage pregnancy
                    through education, advocacy, and creative community engagement.
                </p>
                <a href="/donate" class="btn btn-light btn-lg me-3">Donate Now</a>
                <a href="/about" class="btn btn-outline-light btn-lg">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- IMPACT STATS -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <div class="row g-4">
            <div class="col-md-3">
                <h2 class="text-primary fw-bold">5,000+</h2>
                <p>Girls Reached</p>
            </div>
            <div class="col-md-3">
                <h2 class="text-primary fw-bold">120+</h2>
                <p>School Programs</p>
            </div>
            <div class="col-md-3">
                <h2 class="text-primary fw-bold">300+</h2>
                <p>Families Supported</p>
            </div>
            <div class="col-md-3">
                <h2 class="text-primary fw-bold">Nationwide</h2>
                <p>Community Outreach</p>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="{{ asset('frontend/img/about.jpg') }}" class="img-fluid rounded" alt="About HFRO">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold">Who We Are</h2>
                <p>
                    Happy Family Rwanda Organization (HFRO) is a girl-centered non-profit organization committed
                    to promoting education, health, and economic empowerment while preventing violence and
                    teenage pregnancy.
                </p>
                <ul class="list-unstyled">
                    <li>✔ Community-based solutions</li>
                    <li>✔ Girl-centered programs</li>
                    <li>✔ Sustainable impact</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- PROGRAMS -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Programs</h2>
            <p>Strategic initiatives creating lasting change</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <i class="bi bi-mask fs-1 text-primary mb-3"></i>
                    <h5>Edutainment & Awareness</h5>
                    <p>Using creative arts to educate communities on social challenges.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <i class="bi bi-mortarboard fs-1 text-primary mb-3"></i>
                    <h5>Girls Education & Mentorship</h5>
                    <p>Supporting girls to stay in school and achieve their potential.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
                    <h5>GBV Prevention</h5>
                    <p>Raising awareness and strengthening protection mechanisms.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="fw-bold">Your Support Can Change Lives</h2>
        <p class="lead">Join us in building a safer and more empowered future.</p>
        <a href="/donate" class="btn btn-light btn-lg">Support Our Mission</a>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5>Happy Family Rwanda Organization</h5>
                <p>
                    Legal Personality No: <br>
                    <strong>N° 779/RGB/NGO/LP/11/2021</strong>
                </p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/about" class="text-light">About Us</a></li>
                    <li><a href="/programs" class="text-light">Programs</a></li>
                    <li><a href="/donate" class="text-light">Donate</a></li>
                    <li><a href="/contact" class="text-light">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <p>Email: info@hfro.org</p>
                <p>Location: Rwanda</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
