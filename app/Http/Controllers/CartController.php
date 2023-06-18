<?php

namespace App\Http\Controllers;

use App\Classes\CustomHelpers;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class CartController extends Controller
{
    private function storageInfo()
    {
        return Auth::check() ? 'database' : 'session';
    }

    public function index()
    {
        $user = auth()->user();
        $title = CustomHelpers::setPageTitle('Lista zakupów');
        $items = $user->shoppingCart->cartItems;
        // dd($this->storageInfo());
        return view('shopping_cart/index', [
            'title' => $title,
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user) {

            $cartItem = new ShoppingCartItem();
            $cartItem->product_id = request('id');
            $cartItem->cart_id = $user->shoppingCart->id;
            $cartItem->save();

            $cookieData = $request->hasCookie('product_ids')
                ? unserialize(Cookie::get('product_ids'))
                : [];
            $cookieData[] = $cartItem->product_id;
            $cookie = Cookie::make('product_ids', serialize($cookieData), 56700);
            dd(count(unserialize(Cookie::get('product_ids'))));
            // $cookie = Cookie::forget('product_ids');
            return redirect()->back()->withCookie($cookie);
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
