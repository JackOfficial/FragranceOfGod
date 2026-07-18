@extends('layouts.app')

@section('title', 'Processing Payment | Fragrance Of God')

@section('content')
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            
            <!-- Visual Loading Feedback -->
            <div class="p-5 shadow-sm rounded bg-white border">
                <div class="spinner-border text-warning mb-4" role="status" style="width: 3rem; height: 3rem;">
                    <span class="sr-only">Loading...</span>
                </div>
                
                <h3 class="font-weight-bold mb-2">Connecting to AfriPay</h3>
                <p class="text-muted">Please wait while we safely redirect you to the secure gateway...</p>
                
                <hr class="my-4">
                
                <!-- Order Summary Breakdown -->
                <div class="text-left bg-light p-3 rounded mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Order ID:</span>
                        <span class="font-weight-bold">#{{ $order->id }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Total Amount:</span>
                        <span class="font-weight-bold text-success">
                            {{ number_format($order->amount) }} {{ $order->currency }}
                        </span>
                    </div>
                </div>

                <!-- 
                  Hidden AfriPay Technical Handoff Form
                  Submits directly to their production endpoint.
                -->
                <form action="https://www.afripay.africa/checkout/index.php" method="POST" id="afripay-redirect-form">
                    
                    <!-- Secure Application Integration Credentials -->
                    <input type="hidden" name="app_id" value="{{ config('services.afripay.app_id', '535c6fb21942376266h5234d3aa9r715') }}" />
                    <input type="hidden" name="app_secret" value="{{ config('services.afripay.app_secret', 'JQK9JDEwJNLhQXpu') }}" />
                    
                    <!-- Configuration Routing & Bookkeeping Payloads -->
                    <input type="hidden" name="amount" value="{{ $order->amount }}" />
                    <input type="hidden" name="currency" value="{{ $order->currency }}" />
                    <input type="hidden" name="comment" value="Support for {{ $order->project ? $order->project->title : ($order->event ? $order->event->title : 'General Fund') }}">
                    <input type="hidden" name="client_token" value="{{ $order->id }}" />
                    <input type="hidden" name="return_url" value="{{ config('services.afripay.return_url', 'https://fragranceofgod.org/payment/success') }}" />
                    
                    <!-- Fallback execution block in case JavaScript is disabled on client environment -->
                    <noscript>
                        <p class="text-danger small mt-3">JavaScript seems disabled. Please click the button below to continue:</p>
                        <input type="image" src="https://www.afripay.africa/logos/pay_with_afripay.png" alt="Pay with AfriPay" class="img-fluid" style="max-width: 200px;">
                    </noscript>
                </form>

            </div>
            
        </div>
    </div>
</div>

<!-- Automated Redirect Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Automatically submit the form to forward the user to AfriPay instantly
        document.getElementById('afripay-redirect-form').submit();
    });
</script>
@endsection