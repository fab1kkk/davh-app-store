<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cart_id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
