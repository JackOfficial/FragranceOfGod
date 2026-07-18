<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Project;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display the initial donation context form.
     */
    public function showForm()
    {
        // Fetch active contexts to populate choice dropdowns if needed
        $projects = Project::all();
        $events = Event::all();

        return view('donate.index', compact('projects', 'events'));
    }

    /**
     * Handle the local form submission to build the Order record.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100',
            'currency' => 'required|string|in:RWF,USD',
            'project_id' => 'nullable|exists:projects,id',
            'event_id' => 'nullable|exists:events,id',
            'message' => 'nullable|string|max:500',
        ]);

        // Determine allocation type context
        $type = 'general';
        if ($request->filled('project_id')) {
            $type = 'project';
        } elseif ($request->filled('event_id')) {
            $type = 'event';
        }

        // Initialize instance
        $order = new Order();
        $order->user_id = Auth::id();
        $order->amount = $request->input('amount');
        $order->currency = $request->input('currency');
        $order->project_id = $request->input('project_id');
        $order->event_id = $request->input('event_id');
        $order->type = $type;
        $order->message = $request->input('message');
        $order->status = 'pending';

        // Save individually on the instance level to cleanly trigger observers
        $order->save();

        // Redirect directly to the hidden auto-redirect checkout step
        return redirect()->route('payment.checkout', ['orderId' => $order->id]);
    }

    /**
     * Render the secure handoff step to automatically forward to AfriPay.
     */
    public function checkout($orderId)
    {
        // Load relationships to render contextual comment labels if needed
        $order = Order::with(['project', 'event'])->findOrFail($orderId);
        return view('checkout', compact('order'));
    }

    /**
     * Handle landing target upon successful return redirection from AfriPay.
     */
    public function success()
    {
        return view('payment-success')->with('message', 'Thank you for your support!');
    }

    /**
     * Webhook Endpoint: Processes the asynchronous background status updates from AfriPay.
     */
    public function callback(Request $request)
    {
        Log::info('AfriPay Callback Received:', $request->all());

        $orderId = $request->input('client_token');
        $status = $request->input('status'); 

        DB::beginTransaction();
        try {
            // Apply strict record lock to prevent processing duplication race conditions
            $order = Order::where('id', $orderId)->lockForUpdate()->first();

            if (!$order) {
                DB::rollBack();
                return response()->json(['error' => 'Order not found'], 404);
            }

            // Verify status payload signals successful transaction processing completion
            if ($status === 'success' || $status === 'completed') { 
                
                $order->status = 'completed';
                $order->transaction_ref = $request->input('transaction_ref');
                $order->payment_method = $request->input('payment_method');

                // Explicit validation checking ensures dirty tracking specifically caught a completed status change
                if ($order->isDirty('status') && $order->status === 'completed') {
                    
                    // Note: Execute any project/event custom ledger updates safely here.

                    // Quietly persist updates without triggering an infinite event loop
                    $order->updateQuietly([
                        'status' => 'completed',
                        'transaction_ref' => $order->transaction_ref,
                        'payment_method' => $order->payment_method
                    ]);
                }
            }

            DB::commit();
            return response()->json(['status' => 'processed'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('AfriPay Integration Error: ' . $e->getMessage());
            return response()->json(['error' => 'Transaction failed Processing'], 500);
        }
    }
}