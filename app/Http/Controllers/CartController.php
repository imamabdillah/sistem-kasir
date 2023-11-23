<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $menuId = $request->input('menu_id');
        $menuName = $request->input('nama');
        $menuPrice = $request->input('harga');

        // Lakukan validasi atau operasi lain yang diperlukan di sini

        // Tambahkan item ke database
        $cart = Cart::create([
            'menu_id' => $menuId,
            'nama' => $menuName,
            'harga' => $menuPrice,
            'quantity' => 1,
        ]);

        return response()->json(['success' => true, 'message' => 'Item added to cart', 'cart' => $cart]);
    }


    public function removeFromCart(Request $request)
    {
        $menuId = $request->input('menu_id');

        // Validasi jika menu dengan ID tertentu ada dalam keranjang
        $cartItem = Cart::where('menu_id', $menuId)->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => true, 'message' => 'Item removed from cart', 'cartItem' => $cartItem]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found in cart']);
        }
    }

    public function getCart()
    {
        // Dapatkan informasi keranjang belanja untuk semua pengguna
        $cartInfo = Cart::with('menu')->get();

        // Hitung jumlah item dan total harga
        $totalItems = $cartInfo->sum('quantity');
        $totalPrice = $cartInfo->sum(function ($item) {
            return $item->quantity * $item->menu->harga;
        });

        return response()->json([
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
        ]);
    }
    public function updateCartView()
    {
        try {
            // Dapatkan informasi keranjang belanja untuk semua pengguna
            $cartInfo = Cart::with('menu')->get();

            // Hitung jumlah item dan total harga
            $totalItems = $cartInfo->sum('quantity');
            $totalPrice = $cartInfo->sum(function ($item) {
                return $item->quantity * $item->menu->harga;
            });

            return response()->json([
                'success' => true,
                'totalItems' => $totalItems,
                'totalPrice' => $totalPrice,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    // Tambahkan fungsi-fungsi lainnya sesuai kebutuhan
}
