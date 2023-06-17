<?php

namespace App\Http\Controllers\products;

use App\Classes\CustomHelpers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Product $product): View
    {
        $viewData = [
            'title' => CustomHelpers::setPageTitle('Oferta'),
            'products' => $product->all()
        ];

        return view('product.products.index')->with($viewData);
    }


    public function showAllPerCategory(ProductCategory $category): View
    {
        $products = Product::where('product_categories_id', $category->id)->get();
        $viewData = [
            'title' => CustomHelpers::setPageTitle($category->name),
            'products' => $products,
        ];

        return view('product.products.show_per_category')->with($viewData);
    }

    public function showEach(Product $product): View
    {
        $viewData = [
            'title' => CustomHelpers::setPageTitle($product->name),
            'product' => $product
        ];

        return view('product.products.show_each')->with($viewData);
    }

}
