<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::with('menu')->get();
        $menus = Menu::all();

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
            'menus' => $menus
            // ... tambahkan variabel lain yang diperlukan di sini
        ]);
    }

    public function checkout()
    {
        Log::info('Checkout method called.');

        // Ambil semua item dari cart
        $cartItems = Cart::all();

        // Buat ID unik untuk order
        $uniqueId = hexdec(bin2hex(random_bytes(4)));
        $order = Order::create([
            'id' => $uniqueId,
            'total_price' => $this->calculateTotalPrice($cartItems),
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $cartItem->menu_id,
                'nama' => $cartItem->nama,
                'harga' => $cartItem->harga,
                'quantity' => $cartItem->quantity,
                'note' => $cartItem->note,
            ]);
        }

        Cart::truncate();

        Log::info('Checkout process completed.');

        // Dapatkan Snap Token menggunakan Midtrans Snap
        $params = $this->getMidtransParams($order);
        $snapToken = Snap::getSnapToken($params);

        // Simpan snapToken ke sesi untuk digunakan pada halaman pembayaran
        session(['snapToken' => $snapToken]);

        // Redirect pengguna ke halaman pembayaran
        return Redirect::to($snapToken);
        // return redirect()->route(['process-payment', 'snapToken' => $snapToken]);
    }


    // public function initiatePayment(Request $request)
    // {
    //     // Validasi data yang dibutuhkan, pastikan 'order_id' tersedia dalam request
    //     $request->validate([
    //         'order_id' => 'required|exists:orders,id',
    //     ]);

    //     // Ambil data pesanan berdasarkan 'order_id' yang diberikan
    //     $order = Order::find($request->input('order_id'));

    //     // Validasi pesanan
    //     if (!$order) {
    //         // Handle jika pesanan tidak ditemukan
    //         return response()->json(['error' => 'Order not found'], 404);
    //     }

    //     // Set konfigurasi Midtrans
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
    //     \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized', true);
    //     \Midtrans\Config::$is3ds = config('midtrans.is_3ds', true);

    //     // Lakukan inisiasi pembayaran dan dapatkan Snap Token
    //     $params = $this->getMidtransParams($order);
    //     $snapToken = \Midtrans\Snap::getSnapToken($params);

    //     // Kirim Snap Token sebagai respons JSON
    //     return response()->json(['snapToken' => $snapToken]);
    // }

    // Fungsi untuk menghitung total harga dari item di keranjang
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
        // Ambil semua order items terkait dengan order ini
        $orderItems = $order->orderItems;

        // Buat struktur item_details
        $itemDetails = [];
        foreach ($orderItems as $orderItem) {
            $itemDetails[] = [
                'id' => $orderItem->menu_id, // Sesuaikan dengan id item Anda
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
            'item_details' => $itemDetails,
            // 'customer_details' => [
            //     // Tambahkan detail pelanggan jika diperlukan
            // ],
            // Tambahkan parameter lain jika diperlukan
        ];
    }
}
