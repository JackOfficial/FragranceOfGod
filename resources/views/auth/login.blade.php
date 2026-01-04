@extends('layouts.auth')
@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-md-6">

                <!-- Logo -->
                <img class="mb-4 d-block mx-auto" style="width: 200px;"
                     src="{{ asset('frontend/img/Fog Logo.png') }}" alt="Icon">

                <!-- Card -->
                <div class="card rounded shadow">
                    <div class="card-header text-center fw-bold">
                        Login to Fragrance Of God Organization
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

                        <!-- Google Login -->
                        <a class="btn btn-primary mb-2 d-block text-center"
                           href="{{ url('auth/redirect/google') }}">
                            Login with Google
                            <i class="fa-brands fa-google ms-1"></i>
                        </a>

                        <div class="text-center my-2">Or</div>

                        <!-- Login Form -->
                        <form method="POST" action="/login">
                            @csrf

                            <!-- Email -->
                            <div class="input-group mb-3">
                                <input type="email" name="email"
                                       value="{{ old('email') }}"
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
                                <span class="input-group-text"
                                      style="cursor:pointer"
                                      @click="showPassword = !showPassword">
                                    <i :class="showPassword
                                        ? 'fa-solid fa-eye-slash'
                                        : 'fa-solid fa-eye'"></i>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Forgot Password -->
                            <div class="mb-2">
                                <a href="/forgot-password">Forgot your password?</a>
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-3">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            Don’t have an account? <a href="/register">Register</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
