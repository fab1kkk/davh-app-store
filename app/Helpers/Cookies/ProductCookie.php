<?php

namespace App\Helpers\Cookies;

use App\Models\ShoppingCartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class ProductCookie implements CookieProcessorInterface
{
    private const COOKIE_NAME = 'product_ids';


    public static function apply($cookie = self::COOKIE_NAME)
    {
        $user = Auth::user();
        $cartId = $user->shoppingCart->id;

        if (Cookie::has($cookie)) {
            $cookieItemsIds = unserialize(Cookie::get($cookie));

            ShoppingCartItem::where('cart_id', $cartId)->delete();

            foreach ($cookieItemsIds as $id) {
                $cartItem = new ShoppingCartItem();
                $cartItem->product_id = $id;
                $cartItem->cart_id = $cartId;
                $cartItem->save();
            }
        }
        return Cookie::forget($cookie);
    }

    public static function update()
    {
        
    }
}
