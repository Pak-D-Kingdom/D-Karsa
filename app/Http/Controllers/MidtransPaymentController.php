<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MidtransPaymentController extends Controller
{
    protected MidtransService $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    /**
     * Display Midtrans Checkout Payment Page
     */
    public function checkout(Request $request, $slug)
    {
        $couple = Couple::where('slug', $slug)->firstOrFail();

        // If already paid, redirect straight to success page
        if ($couple->payment_status === 'paid' && $couple->status === 'published') {
            return redirect()->route('invitation.success', $couple->slug);
        }

        if (empty($couple->invoice_number)) {
            $couple->invoice_number = MidtransService::generateInvoiceNumber();
        }

        if (empty($couple->amount) || $couple->amount <= 0) {
            $couple->amount = MidtransService::getPackagePrice($couple->package_name);
        }

        $couple->payment_status = 'pending';
        $couple->save();

        $packageName = $couple->package_name ?: 'Paket Basic';
        $amount = $couple->amount;
        $invoiceNumber = $couple->invoice_number;

        // Try getting Snap Token if Midtrans credentials exist
        $snapToken = null;
        if (MidtransService::hasApiCredentials()) {
            $snapToken = $couple->payment_token ?: $this->midtransService->createSnapToken($couple);
        }

        $snapJsUrl = MidtransService::getSnapJsUrl();
        $clientKey = MidtransService::getClientKey();

        return view('builder.midtrans-checkout', compact(
            'couple',
            'packageName',
            'amount',
            'invoiceNumber',
            'snapToken',
            'snapJsUrl',
            'clientKey'
        ));
    }

    /**
     * Simulate successful payment in Sandbox / Localhost mode
     */
    public function simulatePayment(Request $request, $slug)
    {
        $couple = Couple::where('slug', $slug)->firstOrFail();
        $method = $request->input('method', 'QRIS (Midtrans Sandbox)');

        $this->midtransService->markAsPaid($couple, $method, 'MTR-SIM-' . strtoupper(Str::random(8)));

        return redirect()->route('invitation.success', $couple->slug)
            ->with('payment_success', 'Pembayaran via Midtrans berhasil diverifikasi! Undangan Anda kini telah aktif.');
    }

    /**
     * Midtrans Webhook Notification Handler (Live & Sandbox)
     */
    public function notification(Request $request)
    {
        Log::info("Midtrans Notification Received: ", $request->all());

        $orderId = $request->input('order_id');
        $statusCode = $request->input('status_code');
        $grossAmount = $request->input('gross_amount');
        $signatureKey = $request->input('signature_key');

        if (!$orderId) {
            return response()->json(['status' => 'FAILED', 'message' => 'Missing order_id'], 400);
        }

        $couple = Couple::where('invoice_number', $orderId)->first();

        if (!$couple) {
            Log::warning("Midtrans Notification: Couple with order_id {$orderId} not found.");
            return response()->json(['status' => 'NOT_FOUND'], 404);
        }

        // Verify Signature if provided
        if ($signatureKey && !MidtransService::verifySignature($orderId, $statusCode, $grossAmount, $signatureKey)) {
            Log::warning("Midtrans Signature verification failed for order_id {$orderId}");
            return response()->json(['status' => 'INVALID_SIGNATURE'], 403);
        }

        $transactionStatus = $request->input('transaction_status');
        $fraudStatus = $request->input('fraud_status');
        $paymentType = $request->input('payment_type', 'qris');
        $transactionId = $request->input('transaction_id');

        if ($transactionStatus === 'capture') {
            if ($fraudStatus === 'challenge') {
                $couple->update(['payment_status' => 'challenge']);
            } else if ($fraudStatus === 'accept') {
                $this->midtransService->markAsPaid($couple, "Midtrans - " . strtoupper($paymentType), $transactionId);
                Log::info("Midtrans Payment SUCCESS (Capture) for Couple: {$couple->slug}");
            }
        } else if ($transactionStatus === 'settlement') {
            $this->midtransService->markAsPaid($couple, "Midtrans - " . strtoupper($paymentType), $transactionId);
            Log::info("Midtrans Payment SUCCESS (Settlement) for Couple: {$couple->slug}");
        } else if (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            $couple->update(['payment_status' => 'failed']);
            Log::info("Midtrans Payment FAILED ({$transactionStatus}) for Couple: {$couple->slug}");
        } else if ($transactionStatus === 'pending') {
            $couple->update(['payment_status' => 'pending']);
        }

        return response()->json(['status' => 'OK']);
    }
}
