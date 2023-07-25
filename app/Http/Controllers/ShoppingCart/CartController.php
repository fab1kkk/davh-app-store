<?php

namespace App\Http\Controllers\ShoppingCart;

use App\Http\Controllers\Controller;
use App\Classes\CustomHelpers;
use App\Helpers\ShoppingCart\ShoppingCartHelper;
use App\Helpers\ShoppingCartItem\CartItemHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function show()
    {
        $title = CustomHelpers::setPageTitle('Lista zakupów');
        $products = ShoppingCartHelper::getProducts();
        $cartValue = ShoppingCartHelper::getCartValue();

        $viewData = [
            'title' => $title,
            'products' => $products,
            'cartValue' => $cartValue,
        ];

        return view('shopping_cart/index')
            ->with($viewData);
    }

    public function addToCart(Request $request)
    {
        return CartItemHelper::store($request->input('id'));
    }

    public function removeItemFromCart(ShoppingCartHelper $products, $id)
    {
        return ShoppingCartHelper::removeItem($id);
        // $products = array_values($products->getProductIdsFromCookie());
        // dd(Cookie::get('product_ids'));
        // for ($i = 0; $i < count($products); $i++) {
        //     if ($products[$i] == $id) {
        //         unset($products[$i]);
        //     }
        // }
        // $products = serialize($products);
        // $cookie = Cookie::make('product_ids', $products, 60 * 60 * 24 * 365);
        // return redirect()->back()->withCookie(
        //     $cookie

        // );
    }
}
