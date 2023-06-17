<?php

namespace Database\Seeders;

use App\Models\ShoppingCartItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingCartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShoppingCartItem::factory()->count(40)->create();
    }
}
