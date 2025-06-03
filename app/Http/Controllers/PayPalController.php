<?php

namespace App\Http\Controllers;

use App\Services\PayPalService;

class PayPalController extends Controller
{
    protected $paypalService;

    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    public function createPayment()
    {
        // Generate PayPal payment link
        $paymentLink = $this->paypalService->createPaymentLink();

        // Redirect the user to the PayPal payment page
        return redirect()->away($paymentLink);
    }
}
