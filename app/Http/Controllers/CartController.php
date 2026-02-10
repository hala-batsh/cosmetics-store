<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id)
    {

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }
    public function checkout()
    {
        return view('user.checkout');
    }
}
