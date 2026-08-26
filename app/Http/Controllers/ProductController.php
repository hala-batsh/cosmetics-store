<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;


class ProductController extends Controller
{

    // =====================================================
    // عرض جميع المنتجات للمستخدم
    // =====================================================

    public function index()
    {
        // جلب جميع المنتجات مع الصور المرتبطة بها
        $products = Product::with('photos')->get();

        // إرسال المنتجات إلى صفحة المنتجات
        return view('user.products', compact('products'));
    }


    // =====================================================
    // عرض تفاصيل منتج معين
    // =====================================================

    public function show($id)
    {
        $product = Product::with('photos', 'reviews.user')
            ->findOrFail($id);

        return view('user.product-details', compact('product'));
    }


    // =====================================================
    // إضافة منتج
    // =====================================================

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string'
        ]);


        $product = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category
        ]);

        return redirect()->back();
    }


    // =====================================================
    // تعديل منتج
    // =====================================================

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->back();
    }


    // =====================================================
    // حذف منتج
    // =====================================================

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back();
    }


    // =====================================================
    // عرض المنتجات التي عليها عروض
    // =====================================================

    public function offers()
    {
        $products = Product::whereNotNull('discount_price')
            ->where('status', 1)
            ->get();

        return view('user.offers', compact('products'));
    }
}
