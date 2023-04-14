<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Classes\CustomHelpers;

class AdminController extends Controller
{
    //
    public function index(): View
    {
        $title = CustomHelpers::getAppName() . " Admin Panel"; 
        return view('admin.index', compact('title'));
    }
}
