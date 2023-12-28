<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $menuId = $request->input('menu_id');
        $menuName = $request->input('nama');
        $menuPrice = $request->input('harga');

        // Mengambil nilai parameter tenant dari route
        $tenant = $request->route('tenant');
        // Cek apakah item dengan menu_id sudah ada dalam keranjang
        $existingCartItem = Cart::where('menu_id', $menuId)->first();

        if ($existingCartItem) {
            // Jika sudah ada, tingkatkan jumlahnya
            $existingCartItem->quantity += 1;
            $existingCartItem->save();

            return response()->json(['success' => true, 'message' => 'Item quantity increased in cart', 'cart' => $existingCartItem]);
        }


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
        $tenant = $request->route('tenant');

        // Validasi jika menu dengan ID tertentu ada dalam keranjang
        $cartItem = Cart::where('menu_id', $menuId)->first();

        if ($cartItem) {
            // Jika jumlahnya lebih dari 1, kurangi jumlahnya
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                // Jika hanya satu, hapus item dari keranjang
                $cartItem->delete();
            }

            return response()->json(['success' => true, 'message' => 'Item removed from cart', 'cartItem' => $cartItem]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found in cart']);
        }
    }

    public function updateCartView()
    {
        try {
            // Dapatkan informasi keranjang belanja untuk semua pengguna
            $cartItems = Cart::with('menu')->get();

            // Hitung jumlah item dan total harga
            $totalItems = $cartItems->sum('quantity');
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->quantity * $item->menu->harga;
            });

            // Ambil data yang dibutuhkan untuk tampilan dinamis item keranjang
            $cartData = [];
            foreach ($cartItems as $cartItem) {
                $cartData[] = [
                    'menu' => [
                        'id' => $cartItem->menu->id,
                        'harga' => $cartItem->menu->harga,
                    ],
                    'quantity' => $cartItem->quantity,
                ];
            }

            return response()->json([
                'success' => true,
                'totalItems' => $totalItems,
                'totalPrice' => $totalPrice,
                'cartItems' => $cartData, // Sertakan data item keranjang
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getMenuNote($menuId)
    {
        try {
            $menuNote = Cart::where('menu_id', $menuId)->value('note');
            return response()->json(['success' => true, 'note' => $menuNote]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function saveMenuNote(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'menu_id' => 'required|exists:carts,menu_id',
                'note' => 'nullable|string',
            ]);

            $menuId = $request->input('menu_id');
            $note = $request->input('note');

            // Temukan atau buat objek Cart berdasarkan menu_id
            $cart = Cart::updateOrCreate(['menu_id' => $menuId], ['note' => $note]);

            return response()->json(['success' => true, 'message' => 'Note saved successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
