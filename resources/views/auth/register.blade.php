@extends('layouts.auth')
@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-md-6">

                <img class="mb-4 d-block mx-auto" style="width: 200px;"
                     src="{{ asset('frontend/img/Fog Logo.png') }}" alt="Icon">

                <div class="card rounded shadow">
                    <div class="card-header text-center fw-bold">
                        Sign up For Fragrance Of God Organization
                    </div>

                    <div class="card-body">

                        @error('socialLoginInError')
                            <div class="text-danger text-center mb-2">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (session('status'))
                            <div class="mb-4 text-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="btn mb-2 d-block text-center"
                           style="background-color:#ccc"
                           href="{{ url('auth/redirect/google') }}">
                            Sign up with Google
                            <i class="fa-brands fa-google ms-1"></i>
                        </a>

                        <div class="text-center my-2">Or</div>

                        <form method="POST" action="/register">
                            @csrf

                            <!-- Name -->
                            <div class="input-group mb-3">
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Full name" required>
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Email" required>
                                <span class="input-group-text">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="input-group mb-3" x-data="{ showPassword: false }">
                                <input :type="showPassword ? 'text' : 'password'"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password" required>
                                <span class="input-group-text" style="cursor:pointer"
                                      @click="showPassword = !showPassword">
                                    <i :class="showPassword
                                        ? 'fa-solid fa-eye-slash'
                                        : 'fa-solid fa-eye'"></i>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="input-group mb-3" x-data="{ showConfirm: false }">
                                <input :type="showConfirm ? 'text' : 'password'"
                                       name="password_confirmation"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       placeholder="Re-type your password" required>
                                <span class="input-group-text" style="cursor:pointer"
                                      @click="showConfirm = !showConfirm">
                                    <i :class="showConfirm
                                        ? 'fa-solid fa-eye-slash'
                                        : 'fa-solid fa-eye'"></i>
                                </span>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary w-100">
                                Register
                            </button>

                            <div class="text-center mt-3">
                                Already have an account? <a href="/login">Login</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
