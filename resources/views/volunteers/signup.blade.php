@extends('layouts.app')

@section('title', 'Volunteer Signup | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Volunteer Signup</h1>
        <p class="text-light lead mt-3">Join our mission and make a lasting impact in your community.</p>
        <a href="#signup-form" class="btn btn-lg mt-4" style="background-color:#ffcc00; color:#111; font-weight:600;">
            Apply Now
        </a>
    </div>
</section>

<!-- ================= WHY VOLUNTEER ================= -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold" style="color:#ffcc00;">Why Volunteer With Us?</h2>
        <p class="text-muted fs-5 mt-3 mb-5">
            Make a real difference, gain valuable skills, meet passionate people, and experience the joy of giving back.
        </p>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="p-3 shadow-sm rounded-4 bg-white">
                    <i class="fas fa-hands-helping fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold">Impact Communities</h5>
                    <p class="text-muted">Your efforts directly improve lives of the vulnerable.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 shadow-sm rounded-4 bg-white">
                    <i class="fas fa-users fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold">Connect & Network</h5>
                    <p class="text-muted">Meet like-minded people and expand your personal network.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 shadow-sm rounded-4 bg-white">
                    <i class="fas fa-star fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold">Skill Development</h5>
                    <p class="text-muted">Gain new skills through hands-on experience and training.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 shadow-sm rounded-4 bg-white">
                    <i class="fas fa-heart fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold">Spread Love & Care</h5>
                    <p class="text-muted">Be part of a team that makes a meaningful difference in lives.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= SIGNUP FORM ================= -->
<section id="signup-form" class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Form -->
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4" style="color:#ffcc00;">Become a Volunteer</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('volunteers.submit') }}" method="POST" class="shadow-sm p-4 rounded-4 bg-light">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Phone Number</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" required>
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Volunteer Opportunity</label>
                        <select name="opportunity" class="form-select @error('opportunity') is-invalid @enderror" required>
                            <option value="">Select an opportunity</option>
                            <option value="Community Outreach Volunteer">Community Outreach Volunteer</option>
                            <option value="Youth Mentorship Volunteer">Youth Mentorship Volunteer</option>
                            <option value="Health & Wellness Volunteer">Health & Wellness Volunteer</option>
                            <option value="Fundraising & Advocacy Volunteer">Fundraising & Advocacy Volunteer</option>
                        </select>
                        @error('opportunity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message (Optional)</label>
                        <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror"></textarea>
                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">Submit Application</button>
                    </div>
                </form>
            </div>

            <!-- Image / Visual -->
            <div class="col-lg-6">
                <img src="{{ asset('frontend/img/banner.jpg') }}" alt="Volunteer with Fragrance Of God" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color:#ffcc00;">What Our Volunteers Say</h2>
        <div class="row g-4">
            @foreach ($testimonials ?? [
                ['quote'=>'Volunteering with Fragrance Of God has been life-changing!', 'name'=>'Grace M.'],
                ['quote'=>'I have grown spiritually and socially through serving the community.', 'name'=>'John K.'],
                ['quote'=>'Joining this team made me realize the joy of giving.', 'name'=>'Emily R.']
            ] as $t)
            <div class="col-md-4">
                <div class="p-4 shadow-sm rounded-4 bg-white h-100">
                    <p class="fst-italic">“{{ $t['quote'] }}”</p>
                    <h6 class="fw-bold mt-3 mb-0">{{ $t['name'] }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
