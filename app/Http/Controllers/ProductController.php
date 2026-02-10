<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show($id)
    {
        // بيانات ثابتة مؤقتاً
        $product = [
            'id' => $id,
            'name' => 'Rose Lipstick',
            'price' => 25,
            'description' => 'This gorgeous rose lipstick will give your lips a bright, long-lasting color. Perfect for any occasion.',
            'image' => 'https://placehold.co/400x400/png?text=Product+Image'
        ];

        return view('user.product-details', compact('product'));
    }
}
