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

        <!-- Donation Form Box -->
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

                <!-- Alpine Component Definition wrapper -->
                <div class="p-4 shadow-sm rounded bg-light" x-data="{ currency: 'RWF', allocation: 'general' }">
                    <form action="{{ route('donate.process') }}" method="POST" id="donationform">
                        @csrf

                        <!-- Donation Amount Input -->
                        <div class="form-group mb-4">
                            <label for="amount" class="font-weight-bold">Donation Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Dynamic text updates instantly based on selected currency context -->
                                    <span class="input-group-text bg-white font-weight-bold text-muted" x-text="currency">RWF</span>
                                </div>
                                <input type="number" class="form-control" id="amount" name="amount" value="1000" min="100" required>
                            </div>
                            <small class="form-text text-muted">Enter the amount you wish to contribute to our mission.</small>
                        </div>

                        <!-- Currency Configuration Mapping Interface -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold d-block">Select Currency / Method Context</label>
                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <!-- Dynamic class binding switches standard Bootstrap 4 active layout tokens clean -->
                                    <label class="btn btn-block p-3 shadow-none transition-all"
                                           :class="currency === 'RWF' ? 'btn-outline-warning active text-dark font-weight-bold' : 'btn-outline-warning text-muted'"
                                           style="cursor: pointer;">
                                        <input type="radio" name="currency" value="RWF" class="d-none" x-model="currency">
                                        <span>Local MoMo (RWF)</span>
                                    </label>
                                </div>
                                <div class="col-6 pl-1">
                                    <label class="btn btn-block p-3 shadow-none transition-all"
                                           :class="currency === 'USD' ? 'btn-outline-primary active text-dark font-weight-bold' : 'btn-outline-primary text-muted'"
                                           style="cursor: pointer;">
                                        <input type="radio" name="currency" value="USD" class="d-none" x-model="currency">
                                        <span>International Card (USD)</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Allocation Context Selection for Projects and Events -->
                        <div class="form-group mb-4">
                            <label for="allocation" class="font-weight-bold">Support a Specific Focus (Optional)</label>
                            <select class="form-control" id="allocation" x-model="allocation">
                                <option value="general">General NGO Fund</option>
                                <option value="project">Support a Specific Project</option>
                                <option value="event">Register/Support an Event</option>
                            </select>
                        </div>

                        <!-- Dynamic Select Dropdown for Projects -->
                        <div class="form-group mb-4" x-show="allocation === 'project'" x-transition.fade x-cloak>
                            <label for="project_id" class="font-weight-bold">Choose Project</label>
                            <select class="form-control" id="project_id" name="project_id" :required="allocation === 'project'">
                                <option value="">-- Select Project --</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dynamic Select Dropdown for Events -->
                        <div class="form-group mb-4" x-show="allocation === 'event'" x-transition.fade x-cloak>
                            <label for="event_id" class="font-weight-bold">Choose Event</label>
                            <select class="form-control" id="event_id" name="event_id" :required="allocation === 'event'">
                                <option value="">-- Select Event --</option>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Optional Message Input -->
                        <div class="form-group mb-4">
                            <label for="message" class="font-weight-bold">Message (Optional)</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Add a personal prayer request or note..."></textarea>
                        </div>

                        <!-- Native AfriPay Custom Image CTA Button -->
                        <div class="text-center mt-4">
                            <p class="mb-0">
                                <input type="image" 
                                       src="https://www.afripay.africa/logos/pay_with_afripay.png" 
                                       alt="Pay with AfriPay" 
                                       class="img-fluid"
                                       style="max-width: 240px; cursor: pointer;"
                                       @click.prevent="document.getElementById('donationform').submit();">
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

@endsection