<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;




class RazorpayController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function initiatePayment()
    {
        $api = new Api(config('razorpay.key_id'), config('razorpay.key_secret'));

        // Create an order
        $order = $api->order->create([
            'amount' => 1000,  // Amount in paisa (e.g., 1000 paisa = INR 10)
            'currency' => 'INR',
            'payment_capture' => 1, // Auto-capture payments
            'notes' => [
                'merchant_order_id' => 'your-order-id',
            ],
        ]);

        // Get the order ID
        $orderId = $order->id;

        // Create an invoice
        $invoice = $api->invoice->create([
            'order_id' => $orderId,
        ]);

        // Get the invoice ID
        $invoiceId = $invoice->id;

        // Generate the payment link
        $paymentLink = $api->invoice->createPaymentLink($invoiceId);

        // Redirect the user to the Razorpay checkout page
        return redirect()->away($paymentLink->short_url);
    }

}


