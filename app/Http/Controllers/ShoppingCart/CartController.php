<?php

namespace App\Http\Controllers\ShoppingCart;

use App\Http\Controllers\Controller;
use App\Classes\CustomHelpers;
use App\Helpers\Cookies\CookieProcessor;
use App\Helpers\ShoppingCart\ShoppingCartHelper;
use App\Models\ShoppingCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function show()
    {
        $title = CustomHelpers::setPageTitle('Lista zakupów');
        $products = ShoppingCartHelper::getCartItems();
        $totalAmount = ShoppingCartHelper::getTotalCartAmount();

        $viewData = [
            'title' => $title,
            'products' => $products,
            'totalAmount' => $totalAmount,
        ];

        return view('shopping_cart/index')
            ->with($viewData);
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
