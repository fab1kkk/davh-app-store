<?php

namespace App\Helpers\ShoppingCart;

class ShoppingCart
{
    public static function getTotalAmount($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->price;
        }
        return $total;
    }
}
