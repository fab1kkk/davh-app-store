<?php

namespace App\Http\Controllers\products;

use App\Classes\CustomHelpers;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    //
    public function index(ProductCategory $categories): View
    {
        $viewData = [
            'title' => CustomHelpers::setPageTitle('Oferta'),
            'categories' => $categories->all(),
        ];

        return view('product.categories.index')->with($viewData);
    }
}
