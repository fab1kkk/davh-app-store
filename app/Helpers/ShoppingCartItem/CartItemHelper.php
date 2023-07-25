<?php

namespace App\Helpers\ShoppingCartItem;

use App\Helpers\Cookies\CookieProcessor;
use App\Helpers\Cookies\ProductCookie;
use App\Models\Product;
use App\Models\ShoppingCartItem;
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

    public static function removeFromDb($id)
    {
        $itemToRemove = ShoppingCartItem::where('product_id', $id)->first();
        if ($itemToRemove) {
            $itemToRemove->delete();
            $removedItem = Product::where('id', $id)->first();
            return [
                'success' => true,
                'message' => 'Product ' . $removedItem->name . ' removed.',
                'item' => $removedItem,
            ];
        }
        return [
            'success' => false,
            'message' => 'Item could not be removed.'
        ];
    }

    private static function storeToDb($id)
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

    private static function storeToCookie($id)
    {
        $cookie = ProductCookie::updateOnStore($id);
        return redirect()->back()->withCookie($cookie);
    }
}
