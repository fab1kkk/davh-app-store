<?php

namespace App\Helpers\ShoppingCart;

use App\Helpers\Cookies\CookieProcessor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class ShoppingCart
{
    public static function getTotalCartAmount()
    {
        $items = self::getCartItems();
        $total = 0;
        foreach ($items as $item) {
            $total += $item->price;
        }
        return $total;
    }

    public static function getCartItems()
    {
        $productIds = Auth::check()
            ? self::getProductIdsFromUserCart()
            : self::getProductIdsFromCookie();

        return self::getProductsByIds($productIds);
    }

    public static function getProductIdsFromUserCart()
    {
        $productIds = array();
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = $user->shoppingCart->cartItems;
            $productIds = $cartItems->pluck('product_id');
        }

        return $productIds;
    }

    public static function getProductIdsFromCookie()
    {
        $productCookie = CookieProcessor::getShoppingCartCookieName();

        $productIds = array();
        $productIds = Cookie::get($productCookie)
            ? unserialize(Cookie::get($productCookie))
            : [];

        return $productIds;
    }

    public static function getProductsByIds($productIds)
    {
        $products = array();

        foreach ($productIds as $id) {
            $products[] = Product::find($id);
        }
        return $products;
    }
}
