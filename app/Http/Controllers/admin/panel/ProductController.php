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
            'title' => 'Manage your products',
            'products' => $products->all()
        ];
        return view('admin.panel.products')->with($viewData);
    }
}
