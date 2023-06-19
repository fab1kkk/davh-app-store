<?php

namespace App\Http\Controllers;

use App\Classes\CustomHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [
            'title' => CustomHelpers::setPageTitle('Witaj'),
        ];
        return view('home')->with($viewData);
    }
}
