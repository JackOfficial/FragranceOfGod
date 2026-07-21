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
     * Display the initial donation context form with URL tracking parameters.
     */
    public function showForm(Request $request)
    {
        // 1. Keep dropdown targets efficient
        $projects = Project::select('id', 'title')->latest()->get();
        $events = Event::select('id', 'title')->latest()->get();

        // 2. Capture incoming parameters for UX context matching
        $selectedAllocation = $request->query('allocation', 'general');
        $selectedProjectId = $request->query('project_id');
        $selectedEventId = $request->query('event_id');

        return view('donate.index', compact(
            'projects', 
            'events', 
            'selectedAllocation', 
            'selectedProjectId', 
            'selectedEventId'
        ));
    }

    /**
     * Handle the local form submission to build the Order record.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100',
            'currency' => 'required|string|in:UGX,RWF,USD,KES,TZS,NGN,EUR,GBP',
            'project_id' => 'nullable|exists:projects,id',
            'event_id' => 'nullable|exists:events,id',
            'message' => 'nullable|string|max:500',
        ]);

        $type = 'general';
        if ($request->filled('project_id')) {
            $type = 'project';
        } elseif ($request->filled('event_id')) {
            $type = 'event';
        }

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

        return redirect()->route('payment.checkout', ['orderId' => $order->id]);
    }

    /**
     * Render the secure handoff step to automatically forward to AfriPay.
     */
    public function checkout($orderId)
    {
        $order = Order::with(['project', 'event'])->findOrFail($orderId);
        return view('checkout', compact('order'));
    }

    /**
     * UX Fixed: Intermediate landing page while mobile money STK push processes.
     */
    public function processing()
    {
        return view('donate.payment-processing')->with([
            'title' => 'Payment Initiated',
            'message' => 'Please check your phone for a push notification prompt to authorize your donation.'
        ]);
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

            // Check if status incoming payload dictates a successful collection completion
            if (($status === 'success' || $status === 'completed') && $order->status !== 'completed') { 
                
                // Track fields to update
                $updates = [
                    'status' => 'completed',
                    'transaction_ref' => $request->input('transaction_ref'),
                    'payment_method' => $request->input('payment_method')
                ];

                // If avoiding recursive loop handlers is key, execute logic here before saving quietly
                // e.g., dispatching external allocation updates safely...

                $order->updateQuietly($updates);
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