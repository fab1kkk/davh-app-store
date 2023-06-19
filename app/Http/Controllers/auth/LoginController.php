<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Classes\CustomHelpers;
use App\Models\Product;
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
            $cartId = $user->shoppingCart->id;

            if ($request->hasCookie('product_ids')) {
                $cookieData = unserialize($request->cookie('product_ids'));
                ShoppingCartItem::where('cart_id', $cartId)->delete();

                foreach ($cookieData as $data) {
                    $cartItem = new ShoppingCartItem();
                    $cartItem->product_id = $data;
                    $cartItem->cart_id = $cartId;
                    $cartItem->save();
                }
            }
            
            $cookie = Cookie::forget('product_ids');
            $response = $user->admin
                ? $this->processAdmin()
                : $this->processUser();

            $response->withCookie($cookie);

            return $response;
        }

        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
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
