<?php

namespace App\Http\Controllers;

use App\Classes\CustomHelpers;
use App\Models\ShoppingCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function show()
    {
        $title = CustomHelpers::setPageTitle('Lista zakupów');

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = $user->shoppingCart->cartItems;
        } else {
            $cookieData = Cookie::get('product_ids');
            $cartItems = $cookieData
                ? unserialize($cookieData)
                : [];
        }

        return view('shopping_cart/index', [
            'title' => $title,
            'items' => $cartItems,
        ]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('id');
        if (Auth::check()) {
            $user = Auth::user();

            $cartItem = new ShoppingCartItem();
            $cartItem->product_id = $productId;
            $cartItem->cart_id = $user->shoppingCart->id;
            $cartItem->save();
            return back();
        }
        $cookieData = $request->hasCookie('product_ids')
            ? unserialize(Cookie::get('product_ids'))
            : [];
        $cookieData[] = $productId;

        $cookie = Cookie::make('product_ids', serialize($cookieData), 60 * 60 * 24 * 365);

        return redirect()->back()->withCookie($cookie);
    }
}
