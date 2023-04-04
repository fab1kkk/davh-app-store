<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ['id' => '1', 'name' => 'Bed', 'description' => 'wygodne lozko', 'image' => 'bed.png', 'price' => '1250'],
        ['id' => '2', 'name' => 'Table', 'description' => 'fajny stol', 'image' => 'table.png', 'price' => '250'],
        ['id' => '3', 'name' => 'Mattress', 'description' => 'wygodny materac', 'image' => 'mattress.png', 'price' => '880'],
        ['id' => '4', 'name' => 'Chair', 'description' => 'fajne krzeslo', 'image' => 'chair.png', 'price' => '55'],
    ];

    public function index(): View
    {
        $viewData = [
            'title' => 'Browse our products',
            'products' => ProductController::$products,
        ];

        return view('product.index')->with($viewData);
    }

    public function show($id): View
    {
        $product = ProductController::$products[$id-1];
        $viewData = [
            'product' => $product
        ];

        return view('product.show')->with($viewData);
    }
}
