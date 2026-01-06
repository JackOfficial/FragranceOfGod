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