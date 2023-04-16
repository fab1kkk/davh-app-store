<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
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
        return view('admin.auth.index', compact('title'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only([
            'email',
            'password'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard.index');
        };

        return redirect()->route('admin.index')->withErrors(['invalid' => 'Invalid email or password.']);
    }
}
