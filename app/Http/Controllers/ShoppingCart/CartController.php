<?php

namespace App\Http\Controllers\ShoppingCart;

use App\Http\Controllers\Controller;
use App\Classes\CustomHelpers;
use App\Helpers\ShoppingCart\ShoppingCartHelper;
use App\Helpers\ShoppingCartItem\CartItemHelper;
use Illuminate\Http\Request;


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
        $productId = $request->input('id');
        return CartItemHelper::store($productId);
    }
}
