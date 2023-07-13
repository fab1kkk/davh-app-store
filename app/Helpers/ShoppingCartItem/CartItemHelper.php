<?php

namespace App\Helpers\ShoppingCartItem;

use App\Models\Product;
use App\Models\ShoppingCartItem;

class CartItemHelper
{
    public static function hasCart(Product $product)
    {
        return ShoppingCartItem::where('product_id', $product->id)->exists();
    }

    public static function store()
    {

    }
    public static function storeToDb()
    {

    }
    public static function storeToCookie()
    {

    }
}
