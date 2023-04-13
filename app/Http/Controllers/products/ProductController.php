<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [
            'title' => 'Browse our products',
            'products' => Product::all(),
        ];

        return view('product.products.index')->with($viewData);
    }

    public function showEach($name): View
    {
        $product = Product::where('name', $name)->firstOrFail();
        $viewData = [
            'title' => $product->name . ' - ' . $product->description,
            'product' => $product
        ];

        return view('product.products.show_each')->with($viewData);
    }

    public function showAllPerCategory($name): View
    {
        $category = ProductCategory::where('name', $name)->firstorFail();
        $products = Product::where('product_categories_id', $category->id)->get();
        $viewData = [
            'products' => $products,
        ];

        return view('product.products.show_per_category')->with($viewData);
    }
}
