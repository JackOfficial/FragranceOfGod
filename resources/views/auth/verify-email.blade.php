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
                        Verify Your Email
                    </div>
                    <div class="card-body">

                        <p class="text-muted text-center mb-4">
                            A verification link has been sent to your email address. <br>
                            Please check your inbox and click the link to verify your account.
                        </p>

                        <!-- Session Status -->
                        @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 text-center">
                            A new email verification link has been emailed to you!
                        </div>
                        @endif

                        <!-- Resend Verification Form -->
                        <form method="POST" action="/email/verification-notification">
                            @csrf
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary w-50">Resend Verification Email</button>
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
