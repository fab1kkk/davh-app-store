<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function showProducts(): View
    {
        $viewData = [
            'title' => 'Browse our products',
        ];

        return view('store/products')->with($viewData);
    }
}
