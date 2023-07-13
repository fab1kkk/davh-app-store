<?php

namespace App\Helpers\ShoppingCart;

use App\Helpers\Cookies\CookieProcessor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class ShoppingCartHelper
{
    public static function getCartValue()
    {
        $items = self::getProducts();
        $total = 0.0;
        foreach ($items as $item) {
            $total += $item->price;
        }
        return number_format($total, 2);
    }

    public static function getProducts()
    {
        $logged = Auth::check();
        $productIds = $logged
            ? self::getProductIdsFromDb()
            : self::getProductIdsFromCookie();

        return self::getProductsByIds($productIds);
    }

    public static function getProductsByIds($productIds)
    {
        $products = array();
        foreach ($productIds as $id) {
            $products[] = Product::find($id);
        }
        return $products;
    }

    public static function getProductIdsFromDb()
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
}
