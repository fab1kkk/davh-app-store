<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'beds.png',
            'mattresses.png',
            'sofas.png',
            'armchairs.png',
        ];

        $names = [
            'Łóżko',
            'Materac',
            'Sofa',
            'Fotel',
        ];

        $categoryId = random_int(0, 3);

        $img = $images[$categoryId];
        $name = $names[$categoryId] . ' ' . fake()->name;

        return [
            'name' => $name,
            'description' => fake()->paragraph(),
            'image' => $img,
            'price' => fake()->randomFloat(2, 250, 3000),
            'product_categories_id' => $categoryId + 1,
            'slug' => Str::slug($name),
        ];
    }
}
