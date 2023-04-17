<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [
            'title' => 'Manage your products',
        ];
        return view('admin.panel.products')->with($viewData);
    }
}
