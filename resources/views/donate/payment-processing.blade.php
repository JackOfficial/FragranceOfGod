@extends('layouts.app')

@section('title', 'Processing Donation | Fragrance Of God')

@section('content')
<section class="py-5 d-flex align-items-center" style="min-height: 80vh;">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="p-5 shadow-sm rounded bg-white border">
                    
                    <!-- Loading / Spinner Context Graphic -->
                    <div class="mb-4">
                        <div class="spinner-border text-warning" role="status" style="width: 3rem; height: 3rem;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <!-- Direct UX Guidance Header -->
                    <h2 class="font-weight-bold mb-3" style="color: #111;">Authorize Your Payment</h2>
                    
                    <p class="text-muted lead mb-4">
                        We have initiated a secure payment request. Please check your mobile phone for a <strong>pushed notification prompt</strong> to enter your Mobile Money PIN.
                    </p>

                    <!-- User Intervention Fallback Warning Alert Box -->
                    <div class="alert alert-warning border-0 rounded shadow-none text-left p-3 mb-4" style="font-size: 0.95rem;">
                        <i class="fas fa-info-circle mr-2"></i> <strong>Didn't get the prompt?</strong> 
                        <ul class="mb-0 mt-2 pl-3">
                            <li>Keep your phone screen unlocked.</li>
                            <li>Check if your network signal is stable.</li>
                            <li>If using MTN, you can also dial <code>*182*7#</code> to manually approve pending requests.</li>
                        </ul>
                    </div>

                    <p class="text-muted small">
                        Once you authorize the transaction on your phone, your donation will update automatically.
                    </p>
                    
                    <hr class="my-4">

                    <a href="{{ url('/') }}" class="btn btn-link text-muted font-weight-bold shadow-none text-decoration-none">
                        <i class="fas fa-arrow-left mr-1"></i> Return Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection