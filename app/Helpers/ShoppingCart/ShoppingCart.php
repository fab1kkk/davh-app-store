<?php

namespace App\Helpers\ShoppingCart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class ShoppingCart
{
    public static function getTotalAmount($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item->price;
        }
        return $total;
    }

    public static function getCartItems()
    {
        $productIds = array();
        $products = array();

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = $user->shoppingCart->cartItems;
            $productIds = $cartItems->pluck('product_id');
        } else {
            $productIds = Cookie::get('product_ids') ? unserialize(Cookie::get('product_ids')) : [];
        }

        foreach ($productIds as $id) {
            $products[] = Product::find($id);
        }

        return $products;
    }
}
