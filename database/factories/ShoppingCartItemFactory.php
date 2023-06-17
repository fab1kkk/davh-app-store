<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShoppingCartItem>
 */
class ShoppingCartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'cart_id' => ShoppingCart::all()->random()->id,
            'product_id' => Product::all()->random()->id,
        ];
    }
}
