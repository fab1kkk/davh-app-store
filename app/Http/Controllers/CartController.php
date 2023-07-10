<?php

namespace App\Http\Controllers;

use App\Classes\CustomHelpers;
use App\Helpers\Cookies\CookieProcessor;
use App\Helpers\ShoppingCart\ShoppingCart;
use App\Models\ShoppingCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function show()
    {
        $title = CustomHelpers::setPageTitle('Lista zakupów');
        $totalAmount = 0;
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = $user->shoppingCart->cartItems;
            $totalAmount = ShoppingCart::getTotalAmount($cartItems);
        } else {
            $cookieData = Cookie::get('product_ids');
            $cartItems = $cookieData
                ? unserialize($cookieData)
                : [];
        }

        return view('shopping_cart/index', [
            'title' => $title,
            'items' => $cartItems,
            'totalAmount' => $totalAmount,
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

        $cookie = CookieProcessor::addProductIdToCookie($productId);
        return redirect()->back()->withCookie($cookie);
    }
}
