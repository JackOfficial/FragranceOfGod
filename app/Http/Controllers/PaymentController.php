<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AfripayService;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Order; // Or your custom Donation/Transaction model
use Illuminate\Support\Facades\DB;

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

    public function checkout($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('checkout', compact('order'));
    }

    public function success()
    {
        return view('payment-success')->with('message', 'Thank you for your support!');
    }

    public function callback(Request $request)
    {
        // 1. Log incoming raw data for safety auditing
        Log::info('AfriPay Callback Received:', $request->all());

        $orderId = $request->input('client_token');
        $status = $request->input('status'); // Expected status payload string from provider

        // 2. Open database transaction with record-locking to prevent double execution bugs
        DB::beginTransaction();
        try {
            $order = Order::where('id', $orderId)->lockForUpdate()->first();

            if (!$order) {
                DB::rollBack();
                return response()->json(['error' => 'Order not found'], 404);
            }

            // 3. Process records only if changing state to completed
            if ($status === 'success' || $status === 'completed') { 
                
                // Set the status property
                $order->status = 'completed';
                $order->transaction_ref = $request->input('transaction_ref');
                $order->payment_method = $request->input('payment_method');

                // Evaluate dirty properties to ensure state transitioned directly to completed
                if ($order->isDirty('status') && $order->status === 'completed') {
                    
                    // Fire custom internal processing or logic safely here...

                    // 4. Save using updateQuietly() to execute updates without firing infinite loops 
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