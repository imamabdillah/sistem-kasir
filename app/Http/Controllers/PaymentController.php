<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{

    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$serverKey = config('midtrans.clientKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
        // Config::$appendNotifUrl = config('midtrans.appendNotifUrl');
        // Config::$overrideNotifUrl = config('midtrans.overrideNotifUrl');
        // Config::$paymentIdempotencyKey = config('midtrans.paymentIdempotencyKey');
    }

    public function index()
    {
        // Get Snap Token
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );
        $snapToken = Snap::getSnapToken($params);

        // Tampilkan view dengan Snap Token
        return redirect('tampilancheckout', compact('snapToken'));
    }

    public function midtransNotification(Request $request)
    {
        // Proses notifikasi dari Midtrans
        $notification = new \Midtrans\Notification();
        $transaction = $notification->transaction_status;

        // Handle status pembayaran
        if ($transaction == 'capture' || $transaction == 'settlement') {
            // Pembayaran sukses, lakukan sesuatu (misalnya, tandai pesanan sebagai sukses)
            $this->processSuccessfulPayment($notification->order_id);
        } else {
            // Pembayaran gagal atau lainnya
            $this->processFailedPayment($notification->order_id);
        }

        // Kirim respons 200 OK ke Midtrans
        return response()->json(['status' => 'OK']);
    }

    public function processPayments(Request $request)
    {
        // Proses pembayaran, jika diperlukan
        // ...

        // Redirect ke halaman pembayaran Snap
        return view('payment_confirmation');
    }

    // Metode untuk menangani pembayaran sukses
    protected function processSuccessfulPayment($orderId)
    {
        // Tambahkan logika untuk menangani pembayaran yang sukses
        // Misalnya, tandai pesanan sebagai sukses, kirim email konfirmasi, dll.
    }

    // Metode untuk menangani pembayaran gagal
    protected function processFailedPayment($orderId)
    {
        // Tambahkan logika untuk menangani pembayaran yang gagal
        // Misalnya, tandai pesanan sebagai gagal, kirim email pemberitahuan, dll.
    }
}
