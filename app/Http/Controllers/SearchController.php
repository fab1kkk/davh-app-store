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
            'title'=> "Wyniki wyszukiwania - " . CustomHelpers::getAppName(),
            'products' => $products,
            'resultsMessage' => $products->count() . " products found.",
        ]);
    }

}
