<div>
    <!-- Success Message -->
    @if($successMessage)
        <div class="alert alert-success">{{ $successMessage }}</div>
    @endif

    <!-- Subscription Form -->
    <form wire:submit.prevent="subscribe" class="d-flex">
        <input type="email" wire:model.defer="email" 
               class="form-control form-control-sm me-2 @error('email') is-invalid @enderror"
               placeholder="Your email address" required>
        <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>
    </form>

    <!-- Validation Error -->
    @error('email')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
