<?php

namespace App\Helpers\ShoppingCartItem;

use App\Helpers\Cookies\CookieProcessor;
use App\Models\Product;
use App\Models\ShoppingCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemHelper
{
    public static function hasCart(Product $product)
    {
        return ShoppingCartItem::where('product_id', $product->id)->exists();
    }

    public static function store($id)
    {
        $logged = Auth::check();
        return $logged
            ? self::storeToDb($id)
            : self::storeToCookie($id);
    }

    public static function storeToDb($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartItem = new ShoppingCartItem();
            $cartItem->product_id = $id;
            $cartItem->cart_id = $user->shoppingCart->id;
            $cartItem->save();
            return back();
        }
    }

    public static function storeToCookie($id)
    {
        $cookie = CookieProcessor::addProductIdToCookie($id);
        return redirect()->back()->withCookie($cookie);
    }
}
