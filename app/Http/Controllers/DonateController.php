<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Show the donate page.
     */
    public function index()
    {
        return view('donate.index');
    }

    /**
     * Process the donation form submission.
     */
    public function process(Request $request)
    {
        // Validate input
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:1000',
        ]);

        // Prepare data for payment gateway (Flutterwave example)
        $paymentData = [
            'tx_ref' => 'FOG_' . time(),
            'amount' => $request->amount,
            'currency' => 'USD',
            'payment_options' => 'card,banktransfer,ussd',
            'redirect_url' => route('donate.callback'),
            'customer' => [
                'email' => $request->donor_email,
                'name' => $request->donor_name,
            ],
            'customizations' => [
                'title' => 'Fragrance Of God Donation',
                'description' => 'Supporting Fragrance Of God programs',
            ],
        ];

        // Store donor info in session for callback (or save to DB)
        session([
            'donor_info' => $request->only('donor_name','donor_email','message','amount')
        ]);

        // Redirect to Flutterwave payment page
        // You will need Flutterwave PHP SDK or API call here
        // For now, just return a placeholder view
        return view('donate.payment', compact('paymentData'));
    }

    /**
     * Handle payment callback after donation.
     */
    public function callback(Request $request)
    {
        // Verify payment status from Flutterwave
        // This requires using Flutterwave SDK / API
        // Example: $status = Flutterwave::verifyTransaction($request->tx_ref);

        // For demo, assume payment success
        $status = 'success';

        if($status === 'success') {
            $donorInfo = session('donor_info');
            // TODO: Save donation to database if needed
            return view('donate.thankyou', compact('donorInfo'));
        }

        return redirect()->route('donate.index')->with('error', 'Donation failed. Please try again.');
    }
}
