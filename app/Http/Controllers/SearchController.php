<?php

namespace App\Http\Controllers;

use App\Classes\CustomHelpers;
use App\Models\Product;

class SearchController extends Controller
{
    public function index()
    {
        $products = Product::filter(request(['q']))->get();
        return view('search_results', [
            'title'=> CustomHelpers::setPageTitle('Wyniki wyszukiwania'),
            'products' => $products,
            'resultsMessage' => $products->count() . " products found.",
        ]);
    }

}
