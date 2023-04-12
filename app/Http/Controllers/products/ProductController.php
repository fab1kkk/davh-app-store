<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

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

    public function showEach($id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'title' => $product['name'] . ' - ' . $product['description'],
            'product' => $product
        ];

        return view('product.products.show_each')->with($viewData);
    }

    public function showAllPerCategory($id): View
    {
        $products = Product::all()->where('product_categories_id', $id);
        $viewData = [
            'products' => $products,
        ];

        return view('product.products.show_per_category')->with($viewData);
    }
}
