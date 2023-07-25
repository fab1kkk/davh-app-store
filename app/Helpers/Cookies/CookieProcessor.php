<?php

namespace App\Helpers\Cookies;

use App\Models\ShoppingCartItem;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class CookieProcessor
{
    private const SHOPPING_CART_COOKIE = 'product_ids';


    public static function getShoppingCartCookieName()
    {
        return self::SHOPPING_CART_COOKIE;
    }

    public static function processProductCookieOnLogin()
    {
        $user = Auth::user();
        $cartId = $user->shoppingCart->id;

        if (Cookie::has(self::SHOPPING_CART_COOKIE)) {
            $cookieItemsIds = unserialize(Cookie::get(self::SHOPPING_CART_COOKIE));

            ShoppingCartItem::where('cart_id', $cartId)->delete();

            foreach ($cookieItemsIds as $id) {
                $cartItem = new ShoppingCartItem();
                $cartItem->product_id = $id;
                $cartItem->cart_id = $cartId;
                $cartItem->save();
            }
        }

        return Cookie::forget(self::SHOPPING_CART_COOKIE);
    }

    public static function addProductIdToCookie($id)
    {
        $cookieData = Cookie::has(self::SHOPPING_CART_COOKIE)
            ? unserialize(Cookie::get(self::SHOPPING_CART_COOKIE))
            : [];
        $cookieData[] = $id;
        $cookieData = serialize($cookieData);

        return Cookie::make(self::SHOPPING_CART_COOKIE, $cookieData, 60 * 60 * 24 * 365);
    }

    public static function updateShoppingCartCookie($id)
    {
        if (!Cookie::has(self::SHOPPING_CART_COOKIE)) {
            throw new Exception("Cookie: " . self::SHOPPING_CART_COOKIE . " not found");
        }
        $productIds = array_values(unserialize(Cookie::get(self::SHOPPING_CART_COOKIE)));
        for ($i = 0; $i < count($productIds); $i++) {
            if ($productIds[$i] == $id) {
                unset($productIds[$i]);
                break;
            }
        }
        $productIds = serialize($productIds);
        $newProductCookie = Cookie::make(self::SHOPPING_CART_COOKIE, $productIds, 60 * 60 * 24 * 365);

        return $newProductCookie;
    }
}
