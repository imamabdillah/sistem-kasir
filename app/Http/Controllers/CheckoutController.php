<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use Barryvdh\DomPDF\PDF as PDF;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            $tenant = $user->tenant_id;

            // Now you can use $tenant in your view or other logic
            $carts = Cart::with('menu')->get();
            $menus = Menu::all();
            $transaction = Transaction::all();

            // Menghitung total item dan total harga
            $totalItems = $carts->sum('quantity');
            $totalPrice = $carts->sum(function ($item) {
                return $item->quantity * $item->menu->harga;
            });

            // Kemudian, kirimkan data ke tampilan
            return view('kasir.menu.checkout', [
                'carts' => $carts,
                'totalItems' => $totalItems,
                'totalPrice' => $totalPrice,
                'menus' => $menus,
                'transaction' => $transaction,
                'tenant' => $tenant,
            ]);
        } else {
            // User is not authenticated, show an error message
            return view('errors.unauthenticated');
        }
    }

    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->harga * $cartItem->quantity;
        }

        return $totalPrice;
    }

    // Fungsi untuk mendapatkan parameter Midtrans
    private function getMidtransParams($order)
    {
        // Ambil item pesanan dari order_items atau sesuaikan dengan struktur tabel yang sesuai
        $orderItems = $order->orderItems;

        // Buat array produk untuk Midtrans
        $products = [];

        foreach ($orderItems as $orderItem) {
            $products[] = [
                'id' => $orderItem->menu_id,
                'price' => $orderItem->harga,
                'quantity' => $orderItem->quantity,
                'name' => $orderItem->nama,
            ];
        }

        // Sesuaikan dengan struktur dan kebutuhan data yang dibutuhkan oleh Midtrans
        return [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ],
            'item_details' => $products, // Tambahkan detail produk ke dalam array
        ];
    }


    public function checkout(Request $request)
    {
        $tenant = Auth::user()->tenant_id;
        $currentUser = Auth::user();
        Log::info('Checkout method called.');

        // Ambil item di keranjang
        $cartItems = Cart::all();

        // Pastikan ada item di keranjang sebelum melakukan checkout
        if ($cartItems->isEmpty()) {
            Log::info('Checkout process aborted: Cart is empty.');
            return Redirect::back()->with('error', 'Keranjang kosong. Tidak ada item untuk diproses.');
        }

        // Buat ID unik untuk pesanan
        $uniqueId = hexdec(bin2hex(random_bytes(4)));
        $order = Order::create([
            'id' => $uniqueId,
            'total_price' => $this->calculateTotalPrice($cartItems),
            'tenant_id' => $tenant,
            'user_id' => $currentUser->id,
        ]);

        // Pindahkan item dari keranjang ke order_items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $cartItem->menu_id,
                'nama' => $cartItem->nama,
                'harga' => $cartItem->harga,
                'quantity' => $cartItem->quantity,
                'note' => $cartItem->note,
                'tenant_id' => $tenant,
                'user_id' => $currentUser->id,
            ]);
        }

        // Hapus semua item dari keranjang
        Cart::truncate();

        Log::info('Checkout process completed.');

        $midtransConfig = config('midtrans');

        // Set konfigurasi Midtrans
        \Midtrans\Config::$serverKey = $midtransConfig['server_key'];
        \Midtrans\Config::$clientKey = $midtransConfig['client_key'];
        \Midtrans\Config::$isProduction = $midtransConfig['is_production'];
        \Midtrans\Config::$isSanitized = $midtransConfig['is_sanitized'];
        \Midtrans\Config::$is3ds = $midtransConfig['is_3ds'];

        // Mendapatkan Snap Token menggunakan Midtrans Snap
        $params = $this->getMidtransParams($order);
        $carts = Cart::with('menu')->get();
        $menus = Menu::all();
        $totalItems = $carts->sum('quantity');
        $totalPrice = $carts->sum(function ($item) {
            return $item->quantity * $item->menu->harga;
        });


        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            Log::info('Generate Snap token sukses.');

            // Simpan informasi ke tabel transactions
            $transaction = new Transaction();
            $transaction->order_id = $order->id;
            $transaction->total_price = $order->total_price;
            $transaction->snap_token = $snapToken;
            $transaction->tenant_id = $tenant;
            $transaction->user_id = $currentUser->id;
            $transaction->save();
            Log::info('Transaction saved successfully.');

            return redirect()->route('tampilanpayment', ['id' => $transaction->id]);
        } catch (\Exception $e) {
            Log::error('Error generating Snap token: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghasilkan Snap token. Silakan coba lagi.');
        }
    }

    public function tampilanpayment($id)
    {
        // Mengambil semua order items dari database
        $orderItems = OrderItem::all();

        // Mengambil transaksi berdasarkan ID
        $transaction = Transaction::find($id);

        // Memeriksa apakah transaksi ditemukan
        if (!$transaction) {
            return redirect()->route('tampilanpayment')->with('error', 'Transaksi tidak ditemukan.');
        }

        // Filter order items berdasarkan order id pada transaksi
        $orderItemsForOrderId = $orderItems->filter(function ($item) use ($transaction) {
            return $item->order_id == $transaction->order_id;
        });

        // Mengambil data lain yang diperlukan
        $carts = Cart::with('menu')->get();
        $menus = Menu::all();

        // Menghitung total items dan total price dari order items yang sesuai
        $totalItems = $orderItemsForOrderId->sum('quantity');
        $totalPrice = $orderItemsForOrderId->sum(function ($item) {
            return $item->quantity * $item->harga;
        });

        // Mengirimkan data ke tampilan
        return view('kasir.menu.payment', [
            'carts' => $carts,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
            'menus' => $menus,
            'transaction' => $transaction,
            'orderItems' => $orderItems,
            'order_id' => $transaction->order_id,
            'tenant' => $transaction->tenant,
        ]);
    }


    public function getPaymentStatus($orderId)
    {
        try {
            $transaction = Transaction::where('order_id', $orderId)->first();

            if ($transaction) {
                $paymentStatus = $transaction->status;

                return response()->json(['status' => $paymentStatus], 200);
            } else {
                Log::error('Transaksi tidak ditemukan untuk order_id: ' . $orderId); // Tambahkan log ini
                return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error mendapatkan status pembayaran: ' . $e->getMessage()); // Tambahkan log ini
            return response()->json(['error' => 'Error mendapatkan status pembayaran: ' . $e->getMessage()], 500);
        }
    }

    // public function generateInvoice($transactionId)
    // {
    //     $transaction = Transaction::find($transactionId);

    //     if (!$transaction) {
    //         return redirect()->route('tampilanpayment')->with('error', 'Transaksi tidak ditemukan.');
    //     }

    //     // Mengambil order items dari tabel order_items yang sesuai dengan order_id dari transaction
    //     $orderItems = OrderItem::where('order_id', $transaction->order_id)->get();

    //     // Menghitung total items dan total price dari order items yang sesuai
    //     $totalItems = $orderItems->sum('quantity');
    //     $totalPrice = $orderItems->sum(function ($item) {
    //         return $item->quantity * $item->harga;
    //     });

    //     // Sesuaikan data yang dibutuhkan untuk invoice
    //     $data = [
    //         'transaction' => $transaction,
    //         'orderItems' => $orderItems,
    //         'totalItems' => $totalItems,
    //         'totalPrice' => $totalPrice,
    //     ];

    //     // Generate PDF menggunakan library DomPDF
    //     $pdf = PDF::loadView('pdf.invoice', $data);

    //     // Simpan atau tampilkan PDF (sesuai kebutuhan)
    //     // Contoh menyimpan PDF
    //     $pdfPath = public_path('invoices/invoice_' . $transaction->id . '.pdf');
    //     $pdf->save($pdfPath);

    //     // Jika ingin menampilkan PDF langsung di browser
    //     // return $pdf->stream('invoice.pdf');

    //     return redirect()->route('generate.invoice')->with('success', 'Invoice berhasil dibuat.');
    // }

    public function invoice()
    {
        return view('kasir.menu.invoice');
    }

    public function handleCashPayment(Request $request)
    {
        try {
            // Ambil ID order dari permintaan (bukan transaction_id)
            $orderId = $request->input('order_id');

            // Ambil transaksi dari database berdasarkan order_id
            $transaction = Transaction::where('order_id', $orderId)->first();

            // Perbarui status transaksi menjadi 'success'
            if ($transaction) {
                // Simpan informasi metode pembayaran (sesuaikan bagian ini sesuai kebutuhan Anda)
                $transaction->status = 'success';
                $transaction->payment_method = 'cash'; // Sesuaikan dengan metode pembayaran Anda
                $transaction->save();

                // Lakukan langkah-langkah tambahan yang diperlukan untuk menyelesaikan pembayaran tunai
                // Misalnya, Anda dapat memperbarui stok atau melibatkan proses bisnis tambahan

                // Catat pesan sukses
                Log::info('Pembayaran tunai berhasil untuk order_id: ' . $orderId);

                return response()->json(['message' => 'Pembayaran tunai berhasil'], 200);
            } else {
                // Jika transaksi tidak ditemukan, kirim respons kesalahan
                Log::error('Transaksi tidak ditemukan untuk order_id: ' . $orderId);
                return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
            }
        } catch (\Exception $e) {
            // Catat pesan kesalahan
            Log::error('Error handling cash payment: ' . $e->getMessage());

            return response()->json(['error' => 'Gagal menangani pembayaran tunai'], 500);
        }
    }

    public function handlePaymentSuccess(Request $request)
    {
        try {
            // Ambil ID order dari permintaan (bukan transaction_id)
            $orderId = $request->input('order_id');

            // Ambil transaksi dari database berdasarkan order_id
            $transaction = Transaction::where('order_id', $orderId)->first();

            // Perbarui status transaksi menjadi 'success'
            if ($transaction) {
                // Simpan informasi metode pembayaran (sesuaikan bagian ini sesuai kebutuhan Anda)
                $transaction->status = 'success';
                $transaction->save();

                // Simpan informasi metode pembayaran (sesuaikan bagian ini sesuai kebutuhan Anda)
                $paymentMethod = $request->input('payment_type');
                $transaction->payment_method = $paymentMethod;
                $transaction->save();

                // Catat pesan sukses
                Log::info('Pembayaran berhasil untuk order_id: ' . $orderId);

                return response()->json(['message' => 'Pembayaran berhasil'], 200);
            } else {
                // Jika transaksi tidak ditemukan, kirim respons kesalahan
                Log::error('Transaksi tidak ditemukan untuk order_id: ' . $orderId);
                return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
            }
        } catch (\Exception $e) {
            // Catat pesan kesalahan
            Log::error('Error handling payment success: ' . $e->getMessage());

            return response()->json(['error' => 'Gagal menangani pembayaran berhasil'], 500);
        }
    }
}
