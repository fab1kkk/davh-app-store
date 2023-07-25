<?php

namespace App\Helpers\Cookies;

use App\Models\ShoppingCartItem;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class ProductCookie implements CookieProcessorInterface
{
    private const COOKIE_NAME = 'product_ids';

    public static function getCookieName()
    {
        return self::COOKIE_NAME;
    }

    public static function syncCartFromCookieToDatabase($cookie = self::COOKIE_NAME)
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

    public static function updateOnStore($id)
    {
        $cookieData = Cookie::has(self::COOKIE_NAME)
            ? unserialize(Cookie::get(self::COOKIE_NAME))
            : [];
        $cookieData[] = $id;
        $cookieData = serialize($cookieData);

        return Cookie::make(self::COOKIE_NAME, $cookieData, 60 * 60 * 24 * 365);
    }


    public static function updateOnDelete($id)
    {
        if (!Cookie::has(self::COOKIE_NAME)) {
            throw new Exception("Cookie: " . self::COOKIE_NAME . " not found");
        }
        $productIds = array_values(unserialize(Cookie::get(self::COOKIE_NAME)));
        for ($i = 0; $i < count($productIds); $i++) {
            if ($productIds[$i] == $id) {
                unset($productIds[$i]);
                break;
            }
        }
        $productIds = serialize($productIds);
        $newProductCookie = Cookie::make(self::COOKIE_NAME, $productIds, 60 * 60 * 24 * 365);

        return $newProductCookie;
    }
}
