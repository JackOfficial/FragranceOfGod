<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AfripayService;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected AfripayService $afripay;

    public function __construct(AfripayService $afripay)
    {
        $this->afripay = $afripay;
    }

    public function showForm()
    {
        return view('donate.index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'amount'         => 'required|numeric|min:100',
            'phone_number'   => 'required_if:payment_method,mtn_rw,airtel_rw|nullable|string',
            'payment_method' => 'required|string|in:mtn_rw,airtel_rw,card',
            'email'          => 'nullable|email',
        ]);

        $transactionRef = 'FOG-' . strtoupper(Str::random(10));

        // 1. Log the transaction locally
        $payment = Payment::create([
            'transaction_ref' => $transactionRef,
            'phone_number'    => $request->phone_number ?? 'CARD_PAYMENT',
            'amount'          => $request->amount,
            'payment_method'  => $request->payment_method,
            'email'           => $request->email,
            'currency'        => 'RWF',
            'status'          => 'PENDING',
        ]);

        // 2. Dispatch to Afripay
        $result = $this->afripay->initiatePayment([
            'amount'          => $payment->amount,
            'phone_number'    => $payment->phone_number,
            'payment_method'  => $payment->payment_method,
            'transaction_ref' => $transactionRef,
        ]);

        if (isset($result['status']) && $result['status'] === 'success') {
            // For card payments or integrations returning redirects
            if (!empty($result['url'])) {
                return redirect()->away($result['url']);
            }

            // For Mobile Money push notifications
            return redirect()->back()->with('success', 'A payment prompt has been sent to your phone. Please enter your PIN to complete your donation.');
        }

        // Fail path
        $payment->update(['status' => 'FAILED']);
        return redirect()->back()
            ->withInput()
            ->with('error', $result['message'] ?? 'Unable to initialize transaction with the provider. Please try again.');
    }
}