@extends('layouts.app')

@section('title', 'Volunteer Signup | Fragrance Of God')

@section('content')

<!-- ================= HERO ================= -->
<section class="ngo-hero position-relative d-flex align-items-center" style="min-height:400px;">
    <div class="ngo-hero-overlay"></div>
    <div class="container position-relative text-center">
        <h1 class="ngo-hero-title mt-3" style="color:#ffcc00;">Volunteer Signup</h1>
        <p class="text-light lead mt-3">Join our mission and make a lasting impact in your community.</p>
    </div>
</section>

<!-- ================= SIGNUP FORM ================= -->
<section class="py-5">
    <div class="container" style="max-width:700px;">
        <h2 class="fw-bold text-center mb-4" style="color:#ffcc00;">Become a Volunteer</h2>

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
</section>

@endsection
