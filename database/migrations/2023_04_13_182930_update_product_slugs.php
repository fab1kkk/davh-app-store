<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        $products = Product::all();
        foreach($products as $product){
            $product->slug = Str::slug($product->name);
            $product->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
