<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Show the donate page.
     */

  public function index(Request $request)
{
    // 1. Pull only active or relevant items to keep dropdowns clean
    $projects = Project::select('id', 'title')->latest()->get();
    $events = Event::select('id', 'title')->latest()->get();

    // 2. Collect and sanitize query parameters from the URL
    $selectedAllocation = $request->query('allocation', 'general'); // defaults to 'general'
    $selectedProjectId = $request->query('project_id');
    $selectedEventId = $request->query('event_id');

    // 3. Pass everything downstream to your Blade file
    return view('donate.index', compact(
        'projects', 
        'events', 
        'selectedAllocation', 
        'selectedProjectId', 
        'selectedEventId'
    ));
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

        public function processing()
{
    return view('donate.payment-processing')->with([
        'title' => 'Payment Initiated',
        'message' => 'Please check your phone for a push notification to authorize the transaction by entering your PIN.'
    ]);
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
