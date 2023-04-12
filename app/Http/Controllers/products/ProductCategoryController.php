<?php

namespace App\Http\Controllers\products;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    //
    public function index(): View
    {
        $viewData = [
            'categories' => ProductCategory::all(),
        ];

        return view('product.categories.index')->with($viewData);
    }

    public function show($id): View
    {
        $viewdata = [
            'category' => ProductCategory::findOrFail($id),
        ];
        return view('');
    }
}
