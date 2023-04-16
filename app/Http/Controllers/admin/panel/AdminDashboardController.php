<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    //
    public function index():View
    {
        return view('admin.panel.index');
    }
}
