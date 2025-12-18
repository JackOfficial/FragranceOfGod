@extends('layouts.app')

@section('title', 'Redirecting to Payment | Fragrance Of God')

@section('content')
<section class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold" style="color:#ffcc00;">Redirecting to Payment...</h2>
        <p class="lead mt-3">Please wait while we process your donation.</p>

        <form id="flutterwave-payment-form" action="FLUTTERWAVE_PAYMENT_URL" method="POST">
            @foreach($paymentData as $key => $value)
                @if(is_array($value))
                    @foreach($value as $k => $v)
                        <input type="hidden" name="{{ $key }}[{{ $k }}]" value="{{ $v }}">
                    @endforeach
                @else
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
            <button type="submit" class="btn btn-lg mt-3" style="background-color:#ffcc00; color:#111;">Continue to Pay</button>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.getElementById('flutterwave-payment-form').submit();
</script>
@endpush
