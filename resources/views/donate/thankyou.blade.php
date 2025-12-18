@extends('layouts.app')

@section('title', 'Thank You | Fragrance Of God')

@section('content')
<section class="py-5 text-center" style="background-color:#111; color:#ffcc00;">
    <div class="container">
        <h2 class="fw-bold">Thank You, {{ $donorInfo['donor_name'] }}!</h2>
        <p class="lead mt-3">
            Your generous donation of ${{ $donorInfo['amount'] }} helps us continue transforming lives
            and empowering communities.
        </p>
        <a href="/" class="btn btn-lg" style="background-color:#ffcc00; color:#111; font-weight:600;">Return Home</a>
    </div>
</section>
@endsection
