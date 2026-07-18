@extends('layouts.app')

@section('title', 'Donate | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Support Our Mission</h1>
        <p class="text-light lead mt-3">Your generosity helps us transform lives and communities.</p>
    </div>
</section>

<!-- ================= DONATION INFO ================= -->
<section class="py-5" id="donate-form">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold" style="color:#ffcc00;">Make a Difference Today</h2>
            <p class="text-muted lead mt-3">
                Every donation helps us provide essential services, empower communities,
                and nurture spiritual growth. Choose an amount and join our mission.
            </p>
        </div>

        <!-- Donation Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                
                <!-- Session Notification Banners -->
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm rounded mb-4 p-3">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger border-0 shadow-sm rounded mb-4 p-3">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    </div>
                @endif

                <div class="p-4 shadow-sm rounded bg-light">
                    <!-- 
                      Direct Form Action to AfriPay Hosted Checkout Gateway 
                      as instructed by their technical email integration specifications
                    -->
                    <form action="https://www.afripay.africa/checkout/index.php" method="POST" id="afripayform">
                        
                        <!-- Secure AfriPay Credentials (Pulled cleanly from environment/config) -->
                        <input type="hidden" name="app_id" value="{{ config('services.afripay.app_id', '531c6fb22942376266e5234d3aa92315') }}" />
                        <input type="hidden" name="app_secret" value="{{ config('services.afripay.app_secret', 'JDJ5JDEwJDVhQXpu') }}" />
                        
                        <!-- Configuration and Routing Parameters -->
                        <input type="hidden" name="return_url" value="{{ config('services.afripay.return_url', 'https://fragranceofgod.org/payment/success') }}" />
                        <input type="hidden" name="comment" value="Donation to Fragrance Of God" />
                        
                        <!-- 
                          Unique identifier payload passed into client_token field.
                          If user is authenticated, passes user ID; otherwise defaults to a unique timestamped session tracking token.
                        -->
                        <input type="hidden" name="client_token" value="{{ Auth::check() ? Auth::id() : 'GUEST-'.time() }}" />

                        <!-- Donation Amount Input -->
                        <div class="form-group mb-4">
                            <label Invisible for="amount" class="font-weight-bold">Donation Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white font-weight-bold text-muted" id="currency-addon">RWF</span>
                                </div>
                                <input type="number" class="form-control" id="amount" name="amount" value="500" min="100" required>
                            </div>
                            <small class="form-text text-muted">Enter the amount you wish to contribute to our mission.</small>
                        </div>

                        <!-- Currency Configuration Mapping Interface -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold d-block">Select Currency / Method Context</label>
                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <label class="btn btn-outline-warning btn-block p-3 active text-dark font-weight-bold shadow-none" id="label-rwf">
                                        <input type="radio" name="currency" value="RWF" checked class="d-none" onclick="document.getElementById('currency-addon').innerText = 'RWF';">
                                        <span>Local MoMo (RWF)</span>
                                    </label>
                                </div>
                                <div class="col-6 pl-1">
                                    <label class="btn btn-outline-primary btn-block p-3 text-muted shadow-none" id="label-usd">
                                        <input type="radio" name="currency" value="USD" class="d-none" onclick="document.getElementById('currency-addon').innerText = 'USD';">
                                        <span>International Card (USD)</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Native AfriPay Custom Image CTA Button -->
                        <div class="text-center mt-4">
                            <p class="mb-0">
                                <input type="image" 
                                       src="https://www.afripay.africa/logos/pay_with_afripay.png" 
                                       alt="Pay with AfriPay" 
                                       class="img-fluid"
                                       style="max-width: 240px; cursor: pointer;"
                                       onclick="document.getElementById('afripayform').submit(); return false;">
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= WHY DONATE ================= -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="font-weight-bold" style="color:#ffcc00;">Why Your Support Matters</h2>
        <p class="text-muted lead mt-3 mb-5">
            Your contribution helps us implement programs that restore hope, uplift communities,
            empower youth, strengthen families, and promote spiritual growth.
        </p>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 shadow-sm rounded border-0">
                    <div class="card-body">
                        <i class="fas fa-hands-helping fa-2x text-warning mb-3"></i>
                        <h5 class="font-weight-bold mb-2">Community Outreach</h5>
                        <p class="text-muted mb-0">Support food drives, relief efforts, and social programs for the most vulnerable.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 shadow-sm rounded border-0">
                    <div class="card-body">
                        <i class="fas fa-users fa-2x text-warning mb-3"></i>
                        <h5 class="font-weight-bold mb-2">Youth & Family Empowerment</h5>
                        <p class="text-muted mb-0">Equip young people and families with mentorship, skills, and spiritual guidance.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-4 shadow-sm rounded border-0">
                    <div class="card-body">
                        <i class="fas fa-praying-hands fa-2x text-warning mb-3"></i>
                        <h5 class="font-weight-bold mb-2">Faith & Discipleship</h5>
                        <p class="text-muted mb-0">Enable discipleship programs, prayer initiatives, and spiritual growth opportunities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="font-weight-bold">Your Generosity Transforms Lives</h2>
        <p class="lead mt-3">Together, we can make a lasting impact in our communities and the world.</p>
        <a href="#donate-form" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Donate Now
        </a>
    </div>
</section>

<!-- Simple Layout Script styling helper to manage active toggle state classes safely -->
<script>
    document.getElementById('label-rwf').addEventListener('click', function() {
        this.classList.add('active', 'text-dark', 'font-weight-bold');
        this.classList.remove('text-muted');
        document.getElementById('label-usd').classList.remove('active', 'text-dark', 'font-weight-bold');
        document.getElementById('label-usd').classList.add('text-muted');
    });

    document.getElementById('label-usd').addEventListener('click', function() {
        this.classList.add('active', 'text-dark', 'font-weight-bold');
        this.classList.remove('text-muted');
        document.getElementById('label-rwf').classList.remove('active', 'text-dark', 'font-weight-bold');
        document.getElementById('label-rwf').classList.add('text-muted');
    });
</script>

@endsection