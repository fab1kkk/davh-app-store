<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
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
            'users' => User::all(),
            'currentUser' => ucwords(substr(Auth::user()->name, 0, strpos(Auth::user()->name, "@"))),
            'title' => "Admin Dashboard Panel - manage your products, user and more!"
        ];

        return view('admin.panel.index')->with($viewdata);
    }
}
