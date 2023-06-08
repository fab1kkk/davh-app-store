<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Product $products): View
    {
        $viewData = [
            'title' => 'Manage products',
            'products' => $products->paginate(3)
        ];
        return view('admin.panel.products')->with($viewData);
    }
}
