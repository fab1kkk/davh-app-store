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
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        return Auth::attempt($validated) ?
            redirect()->route('admin.panel.index') :
            back()->withErrors(['email' => "Email cannot be matched. Try again."]);
    }
}
