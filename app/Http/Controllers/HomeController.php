<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => config('app.name'),
        ];
        return view('home')->with($viewData);
    }
}
