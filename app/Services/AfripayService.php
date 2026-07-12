<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AfripayService
{
    protected string $baseUrl;
    protected string $appId;
    protected string $appSecret;

    public function __construct()
    {
        $this->baseUrl = config('services.afripay.base_url');
        $this->appId = config('services.afripay.app_id');
        $this->appSecret = config('services.afripay.app_secret');
    }

    /**
     * Initiate C2B Payment Request
     */
    public function initiatePayment(array $data)
    {
        // Afripay expects multipart/form-data for C2B endpoints
        $response = Http::asMultipart()->post("{$this->baseUrl}/v1/c2b", [
            'request' => 'payment',
            'payment_type' => '3', // Default type designation for common C2B integrations
            'app_id' => $this->appId,
            'app_secret' => $this->appSecret,
            'payment_method' => $data['payment_method'],
            'amount' => $data['amount'],
            'currency' => $data['currency'] ?? 'RWF',
            'mobile' => $data['phone_number'], // Payer phone
            'transaction_ref' => $data['transaction_ref'],
            'callbackURL' => route('afripay.callback'),
        ]);

        return $response->json();
    }

    /**
     * Check Transaction Status Manually
     */
    public function checkStatus(string $transactionRef)
    {
        $response = Http::asMultipart()->post("{$this->baseUrl}/v1/c2b", [
            'request' => 'transaction',
            'action' => 'checkstatus',
            'app_id' => $this->appId,
            'app_secret' => $this->appSecret,
            'transaction_ref' => $transactionRef,
        ]);

        return $response->json();
    }
}