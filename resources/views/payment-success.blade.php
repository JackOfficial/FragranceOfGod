@extends('layouts.app')

@section('title', 'Thank You | Fragrance Of God')

@section('content')

<!-- ================= SUCCESS HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center bg-dark text-white text-center" style="min-height: 350px;">
    <div class="ngo-hero-overlay" style="position: absolute; top:0; left:0; right:0; bottom:0; bg: rgba(0,0,0,0.5);"></div>
    <div class="container position-relative py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Large Success Icon -->
                <div class="mb-4">
                    <i class="fas fa-check-circle text-warning display-3"></i>
                </div>
                <h1 class="font-weight-bold" style="color: #ffcc00;">Payment Successful!</h1>
                <p class="lead mt-3 text-light">
                    {{ $message ?? 'Thank you for your support!' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= APPRECIATION MESSAGE ================= -->
<section class="py-5">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="card p-5 shadow-sm border-0 rounded bg-light">
                    <div class="card-body">
                        <h3 class="font-weight-bold mb-3" style="color: #111;">Your Generosity in Action</h3>
                        <p class="text-muted lead">
                            We have safely received your contribution. Because of partners like you, 
                            Fragrance of God can continue providing essential resources, empowering local youth, 
                            and strengthening families within our communities.
                        </p>
                        
                        <hr class="my-4">
                        
                        <p class="text-muted small mb-4">
                            A confirmation receipt has been generated for this transaction. If you have any questions 
                            regarding your donation tracking status, please contact our support team.
                        </p>
                        
                        <!-- Navigation Options -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center">
                            <a href="{{ url('/') }}" class="btn btn-warning font-weight-bold text-dark px-4 py-2 m-2 shadow-none" style="background-color: #ffcc00; border: none;">
                                <i class="fas fa-home mr-2"></i> Return Home
                            </a>
                            <a href="{{ url('/about') }}" class="btn btn-outline-secondary px-4 py-2 m-2 shadow-none">
                                See Our Impact <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection