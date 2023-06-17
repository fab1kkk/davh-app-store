<?php

namespace App\Http\Controllers;

use App\Classes\CustomHelpers;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => CustomHelpers::setPageTitle('Witaj'),
        ];
        return view('home')->with($viewData);
    }
}
