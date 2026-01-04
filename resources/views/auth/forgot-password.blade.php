@extends('layouts.auth')
@section('content')

<div class="container-fluid about py-2">
    <div class="container py-5">
        <div class="row g-5 justify-content-center">
            <div class="col-md-6">

                <!-- Logo -->
                <img class="mb-4 d-block mx-auto" style="width: 200px;" src="{{ asset('frontend/img/Fog Logo.png') }}" alt="Fragrance Of God Logo">

                <!-- Card -->
                <div class="card rounded shadow">
                    <div class="card-header text-center fw-bold">
                        Recover Your Password
                    </div>
                    <div class="card-body">

                        <p class="text-muted text-center mb-4">
                            Enter your email address and we’ll send you a link to reset your password.
                        </p>

                        <!-- Display Session Status -->
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 text-center">
                            {{ session('status') }}
                        </div>
                        @endif

                        <!-- Recover Password Form -->
                        <form method="POST" action="/forgot-password">
                            @csrf

                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ old('email') }}" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="Email" required />
                                <div class="input-group-append">
                                    <div class="input-group-text h-100">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary w-50">Submit</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="/login">Back to Login</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
