<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Classes\CustomHelpers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        $viewData = [
            'title' => CustomHelpers::setPageTitle('Zarejestruj się')
        ];
        return view('auth.register')->with($viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('login.index')->with('success_form', "Account has been created.");
    }
}
