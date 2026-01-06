<section id="signup-form" class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">

            <!-- ================= FORM ================= -->
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4" style="color:#ffcc00;">
                    Become a Volunteer
                </h2>

                {{-- Success message --}}
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="store"
                      class="shadow-sm p-4 rounded-4 bg-light">

                    {{-- Full Name --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Name</label>
                        <input type="text"
                               wire:model.defer="name"
                               class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email Address</label>
                        <input type="email"
                               wire:model.defer="email"
                               class="form-control @error('email') is-invalid @enderror">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Phone Number</label>
                        <input type="text"
                               wire:model.defer="phone"
                               class="form-control @error('phone') is-invalid @enderror">

                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Opportunity --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Volunteer Opportunity</label>
                        <select wire:model.defer="opportunity"
                                class="form-select @error('opportunity') is-invalid @enderror">
                            <option value="">Select an opportunity</option>
                            <option value="Community Outreach Volunteer">Community Outreach Volunteer</option>
                            <option value="Youth Mentorship Volunteer">Youth Mentorship Volunteer</option>
                            <option value="Health & Wellness Volunteer">Health & Wellness Volunteer</option>
                            <option value="Fundraising & Advocacy Volunteer">Fundraising & Advocacy Volunteer</option>
                        </select>

                        @error('opportunity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Message --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message (Optional)</label>
                        <textarea rows="4"
                                  wire:model.defer="message"
                                  class="form-control @error('message') is-invalid @enderror"></textarea>

                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="text-center">
                        <button type="submit"
                                class="btn btn-lg"
                                style="background-color:#ffcc00; color:#111; font-weight:600;"
                                wire:loading.attr="disabled">

                            <span wire:loading.remove>Submit Application</span>
                            <span wire:loading>Please wait...</span>
                        </button>
                    </div>

                </form>
            </div>

            <!-- ================= IMAGE ================= -->
            <div class="col-lg-6">
                <img src="{{ asset('frontend/img/banner.jpg') }}"
                     alt="Volunteer with Fragrance Of God"
                     class="img-fluid rounded shadow">
            </div>

        </div>
    </div>
</section>
