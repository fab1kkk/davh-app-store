<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //

    public function index(User $user): View
    {
        $viewdata = [
            'title' => "Admin Dashboard Panel - manage your products, user and more!",
            'users' => $user->all(),
        ];

        return view('admin.panel.layout')->with($viewdata);
    }


}
