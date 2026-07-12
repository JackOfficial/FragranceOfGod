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
        // 1. Validate inputs based on incoming Blade form names
        $request->validate([
            'firstname'    => 'required|string|max:255',
            'lastname'     => 'required|string|max:255',
            'email'        => 'required|email',
            'amount'       => 'required|numeric|min:100',
            'currency'     => 'required|string|in:RWF,USD', // Maps to payment type from radios
            'phone'        => 'required_unless:currency,USD|nullable|string|min:9|max:9',
            'client_token' => 'nullable|integer', // Optional user ID for guest/auth compatibility
        ]);

        $transactionRef = 'FOG-' . strtoupper(Str::random(10));

        // Determine currency and standard payment provider label
        $isCard = $request->input('currency') === 'USD';
        $currencyCode = $isCard ? 'USD' : 'RWF';
        $phoneNumber = $isCard ? 'CARD_PAYMENT' : $request->input('phone');

        // 2. Log the transaction locally
        $payment = Payment::create([
            'transaction_ref' => $transactionRef,
            'user_id'         => $request->input('client_token'), // Safely tracks user or null if guest
            'firstname'       => $request->input('firstname'),
            'lastname'        => $request->input('lastname'),
            'email'           => $request->input('email'),
            'phone_number'    => $phoneNumber,
            'amount'          => $request->input('amount'),
            'payment_method'  => $isCard ? 'card' : 'mobile_money', 
            'currency'        => $currencyCode,
            'status'          => 'PENDING',
        ]);

        // 3. Dispatch to Afripay with explicit payload matching your form's configuration
        $result = $this->afripay->initiatePayment([
            'app_id'          => $request->input('app_id'),
            'app_secret'      => $request->input('app_secret'),
            'amount'          => $payment->amount,
            'currency'        => $payment->currency,
            'phone'           => $payment->phone_number,
            'firstname'       => $payment->firstname,
            'lastname'        => $payment->lastname,
            'email'           => $payment->email,
            'transaction_ref' => $transactionRef,
            'comment'         => $request->input('comment', 'Donation to Fragrance Of God'),
            'return_url'      => $request->input('return_url'),
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