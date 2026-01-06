<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Send Us a Message</h2>

                @if(session()->has('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif

                <form wire:submit.prevent="submit" class="mt-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject</label>
                        <input type="text" wire:model="subject" class="form-control @error('subject') is-invalid @enderror">
                        @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Message</label>
                        <textarea wire:model="message" rows="6" class="form-control @error('message') is-invalid @enderror"></textarea>
                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6">
                <h2 class="fw-bold" style="color:#ffcc00;">Get in Touch</h2>
                <p class="text-muted fs-5 mt-3">
                    Have questions or want to learn more about our programs? Reach us via phone, email, or visit our office.
                </p>

                <ul class="list-unstyled mt-4">
                    <li class="mb-3"><i class="fas fa-map-marker-alt me-2 text-warning"></i> Kigali, Rwanda</li>
                    <li class="mb-3"><i class="fas fa-phone me-2 text-warning"></i> +250 788 123 456</li>
                    <li class="mb-3"><i class="fas fa-envelope me-2 text-warning"></i> info@fragranceofgod.org</li>
                </ul>

                <!-- Optional: Embed Google Map -->
                <div class="mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!..." width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
