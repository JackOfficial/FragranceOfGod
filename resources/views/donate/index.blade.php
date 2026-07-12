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
            <h2 class="fw-bold" style="color:#ffcc00;">Make a Difference Today</h2>
            <p class="text-muted fs-5 mt-3">
                Every donation helps us provide essential services, empower communities,
                and nurture spiritual growth. Choose an amount and join our mission.
            </p>
        </div>

        <!-- Donation Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                
                <!-- Session Notification Banners -->
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 p-3">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 p-3">
                        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    </div>
                @endif

                <div class="p-4 shadow-sm rounded-4 bg-light">
                    <!-- Initialized Alpine.js context to watch payment choices -->
                    <form action="{{ route('payment.process') }}" method="POST" x-data="{ method: 'mtn_rw' }">
                        @csrf
                        
                        <!-- AfriPay infrastructure parameters -->
                        <input type="hidden" name="app_id" value="1e9850a2ff2c5e7c3ae46c4ab68557ea" />
                        <input type="hidden" name="app_secret" value="JDJ5JDEwJDFlbFhF" />
                        <!-- Redirects user back safely to the GET route instead of the POST webhook -->
                        <input type="hidden" name="return_url" value="{{ route('donate.show') }}" />
                        <input type="hidden" name="comment" value="Donation to Fragrance Of God" />
                        @if(Auth::check())
                            <input type="hidden" name="client_token" value="{{ Auth::id() }}" />
                        @endif

                        {{-- Full Name mapped to AfriPay firstname/lastname structure --}}
                        <div class="mb-4">
                            <label for="firstname" class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname') }}" placeholder="Your full name" required>
                            <!-- Hidden tracking for processor consistency -->
                            <input type="hidden" name="lastname" value="Donor">
                            @error('firstname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Email updated to AfriPay explicit 'email' --}}
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Your email" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Amount mapping --}}
                        <div class="mb-4">
                            <label for="amount" class="form-label fw-bold">Donation Amount (RWF)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white fw-bold text-muted">FRW</span>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', '1000') }}" placeholder="Enter amount" min="100" required>
                                @error('amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Payment Provider Selector UI -->
                        <div class="mb-4">
                            <label class="form-label fw-bold d-block">Select Payment Method</label>
                            <div class="row g-2">
                                <!-- MTN Option -->
                                <div class="col-4">
                                    <label class="w-100 border rounded-3 p-3 text-center cursor-pointer d-flex flex-column align-items-center transition-all"
                                        :class="method === 'mtn_rw' ? 'border-warning bg-warning-subtle text-dark fw-bold' : 'bg-white text-muted'" style="cursor: pointer;">
                                        <input type="radio" name="currency" value="RWF" class="d-none" x-model="method" @click="method = 'mtn_rw'">
                                        <span class="small">MTN MoMo</span>
                                    </label>
                                </div>

                                <!-- Airtel Option -->
                                <div class="col-4">
                                    <label class="w-100 border rounded-3 p-3 text-center cursor-pointer d-flex flex-column align-items-center transition-all"
                                        :class="method === 'airtel_rw' ? 'border-danger bg-danger-subtle text-danger fw-bold' : 'bg-white text-muted'" style="cursor: pointer;">
                                        <input type="radio" name="currency" value="RWF" class="d-none" x-model="method" @click="method = 'airtel_rw'">
                                        <span class="small">Airtel Money</span>
                                    </label>
                                </div>

                                <!-- Card Option -->
                                <div class="col-4">
                                    <label class="w-100 border rounded-3 p-3 text-center cursor-pointer d-flex flex-column align-items-center transition-all"
                                        :class="method === 'card' ? 'border-primary bg-primary-subtle text-primary fw-bold' : 'bg-white text-muted'" style="cursor: pointer;">
                                        <input type="radio" name="currency" value="USD" class="d-none" x-model="method" @click="method = 'card'">
                                        <span class="small">Debit Card</span>
                                    </label>
                                </div>
                            </div>
                            @error('currency') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Dynamic Mobile Phone Field updated to AfriPay parameter name 'phone' -->
                        <div class="mb-4" x-show="method !== 'card'" x-transition>
                            <label for="phone" class="form-label fw-bold">Mobile Money Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">+250</span>
                                <!-- FIXED Syntax: altered double colon to single colon -->
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}"
                                    :placeholder="method === 'mtn_rw' ? 'e.g., 78XXXXXXX' : 'e.g., 73XXXXXXX'"
                                    :required="method !== 'card'" minlength="9" maxlength="9">
                            </div>
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold">Message (Optional)</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Any message you'd like to share">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-lg w-100" style="background-color:#ffcc00; color:#111; font-weight:600;">
                            Donate Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= WHY DONATE ================= -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold" style="color:#ffcc00;">Why Your Support Matters</h2>
        <p class="text-muted fs-5 mt-3 mb-5">
            Your contribution helps us implement programs that restore hope, uplift communities,
            empower youth, strengthen families, and promote spiritual growth.
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm rounded-4">
                    <i class="fas fa-hands-helping fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-2">Community Outreach</h5>
                    <p class="text-muted">Support food drives, relief efforts, and social programs for the most vulnerable.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm rounded-4">
                    <i class="fas fa-users fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-2">Youth & Family Empowerment</h5>
                    <p class="text-muted">Equip young people and families with mentorship, skills, and spiritual guidance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm rounded-4">
                    <i class="fas fa-praying-hands fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold mb-2">Faith & Discipleship</h5>
                    <p class="text-muted">Enable discipleship programs, prayer initiatives, and spiritual growth opportunities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Your Generosity Transforms Lives</h2>
        <p class="lead mt-3">Together, we can make a lasting impact in our communities and the world.</p>
        <a href="#donate-form" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Donate Now
        </a>
    </div>
</section>

@endsection