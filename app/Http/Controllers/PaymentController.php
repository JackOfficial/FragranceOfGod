<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AfripayService;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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
            'firstname'     => 'required|string|max:255',
            'lastname'      => 'required|string|max:255',
            'email'         => 'required|email',
            'amount'        => 'required|numeric|min:100',
            'currency'      => 'required|string|in:RWF,USD', // Maps to currency type from radios
            'provider_type' => 'required|string|in:mtn_rw,airtel_rw,card', // Captures UI Alpine state
            'phone'         => 'required_unless:currency,USD|nullable|string|min:9|max:9',
            'client_token'  => 'nullable|integer', // Optional user ID for guest/auth compatibility
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

        // Map selection strings to AfriPay expected channel parameters
        // 1 = MTN MoMo, 2 = Airtel Money, 3 = Card
        $providerType = $request->input('provider_type');
        if ($isCard || $providerType === 'card') {
            $paymentMethodId = '3';
        } elseif ($providerType === 'airtel_rw') {
            $paymentMethodId = '2';
        } else {
            $paymentMethodId = '1';
        }

        // 3. Dispatch to Afripay with explicit payload keys matching your Service array design
        $result = $this->afripay->initiatePayment([
            'amount'          => $payment->amount,
            'currency'        => $payment->currency,
            'transaction_ref' => $transactionRef,
            'payment_method'  => $paymentMethodId, // Fixes: Undefined array key "payment_method"
            'phone_number'    => $payment->phone_number, // Fixes: Undefined array key "phone_number"
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

    /**
     * Handle the incoming payment status webhook callback from AfriPay.
     */
    public function handleCallback(Request $request)
    {
        // Optional: Log the incoming payload for troubleshooting
        Log::info('AfriPay Callback Received:', $request->all());

        // 1. Locate the transaction using the unique reference you passed earlier
        $ref = $request->input('transaction_ref'); 
        $payment = Payment::where('transaction_ref', $ref)->first();

        if (!$payment) {
            Log::error("AfriPay Callback Error: Payment reference {$ref} not found.");
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        // Avoid overwriting a transaction that was already finalized
        if ($payment->status === 'SUCCESSFUL' || $payment->status === 'FAILED') {
            return response()->json(['status' => 'success', 'message' => 'Already processed']);
        }

        // 2. Evaluate the status sent by AfriPay
        $afripayStatus = strtoupper($request->input('status'));

        if ($afripayStatus === 'SUCCESS' || $afripayStatus === 'SUCCESSFUL') {
            $payment->update([
                'status' => 'SUCCESSFUL',
            ]);

            Log::info("Payment reference {$ref} was successfully completed.");
        } else {
            $payment->update(['status' => 'FAILED']);
            Log::warning("Payment reference {$ref} failed during verification.");
        }

        // 3. Respond with a 200 OK so AfriPay knows your endpoint received it
        return response()->json(['status' => 'success']);
    }
}