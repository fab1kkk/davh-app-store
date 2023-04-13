<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Product $product): View
    {
        $viewData = [
            'title' => 'Browse our products',
            'products' => $product->all()
        ];

        return view('product.products.index')->with($viewData);
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

    public function showEach(Product $product): View
    {
        $viewData = [
            'title' => $product->name,
            'product' => $product
        ];

        return view('product.products.show_each')->with($viewData);
    }
}
