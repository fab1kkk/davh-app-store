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

        return view('product.index')->with($viewData);
    }

    public function show($id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'title' => $product['name'] . ' - ' . $product['description'],
            'product' => $product
        ];

        return view('product.show')->with($viewData);
    }
}
