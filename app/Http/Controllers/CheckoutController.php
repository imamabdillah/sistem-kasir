<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::all();

        // Menghitung total item dan total harga
        $totalItems = $cart->sum('quantity');
        $totalPrice = $cart->sum(function ($item) {
            return $item->quantity * $item->menu->harga;
        });

        // Kemudian, kirimkan data ke tampilan
        return view('kasir.menu.checkout', [
            'cart' => $cart,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
            // ... tambahkan variabel lain yang diperlukan di sini
        ]);
    }
}
