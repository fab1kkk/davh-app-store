<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    //
    public function index(ProductCategory $categories): View
    {
        $viewData = [
            'categories' => $categories->all(),
        ];

        return view('product.categories.index')->with($viewData);
    }
}
