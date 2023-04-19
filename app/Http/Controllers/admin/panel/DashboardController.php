<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        $viewdata = [
            'title' => "Admin Dashboard Panel - manage your products, user and more!",
            'users' => User::all(),
        ];

        return view('admin.panel.index')->with($viewdata);
    }


}
