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

<footer class="bg-dark text-light mt-5">
    <div class="container pt-3 text-center small">
        © {{ date('Y') }} Fragrance Of God NGO. All Rights Reserved.
    </div>
</footer>

<!-- ================= SCRIPTS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
