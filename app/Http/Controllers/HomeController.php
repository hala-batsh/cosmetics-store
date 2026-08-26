<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::with('photos')
            ->where('status', 1)
            ->latest()
            ->take(8)
            ->get();


        $offers = Product::with('photos')
            ->whereNotNull('discount_price')
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();


        return view('user.home', compact('products', 'offers'));
    }
}
