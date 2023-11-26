<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

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
}
