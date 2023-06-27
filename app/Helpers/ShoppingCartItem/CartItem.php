<?php

namespace App\Helpers\ShoppingCartItem;

use App\Models\Product;
use App\Models\ShoppingCartItem;

class CartItem
{
    public static function hasCart(Product $product)
    {
        return ShoppingCartItem::where('product_id', $product->id)->exists();
    }
}
