<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->menu_id);

        if (!$menu) {
            return response()->json(['message' => 'Menu not found'], 404);
        }

        $cart = new Cart([
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'total_price' => $menu->harga * $request->quantity,
        ]);

        $cart->save();

        // You can return a response as needed (e.g., success message, updated cart data)
        return response()->json(['message' => 'Menu added to cart', 'cart' => $cart]);
    }

    public function getCart()
    {
        // Implement logic to retrieve and return cart items
        $cartItems = Cart::with('menu')->get();

        return response()->json(['cartItems' => $cartItems]);
    }
}
