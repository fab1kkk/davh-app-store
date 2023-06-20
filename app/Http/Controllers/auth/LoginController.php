<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Classes\CustomHelpers;
use App\Helpers\Cookies\CookieProcessor;
use App\Models\ShoppingCartItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index(): View
    {
        $viewData = [
            'title' => CustomHelpers::setPageTitle('Zaloguj sie'),
        ];
        return view('auth.login')
            ->with($viewData);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            $response = $user->admin
                ? redirect()->route('admin.dashboard.index')
                : redirect()->route('home.index')->with('success_form', "Logged in.");
                
            return $response->withCookie(CookieProcessor::processProductCookieOnLogin());
        }
        return back()
            ->withErrors(
                [
                    'email' => 'Invalid credentials.',
                ]
            );
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home.index');
    }

    public function processAdmin()
    {
        return redirect()->route('admin.dashboard.index');
    }

    public function processUser()
    {
        return redirect()->route('home.index')->with('success_form', "Logged in.");
    }
}
