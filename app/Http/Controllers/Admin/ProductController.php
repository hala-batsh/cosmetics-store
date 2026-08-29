<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\photo;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);


        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'stock' => $request->stock,
            'sku' => $request->sku,
        ]);

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('products', 'public');

            Photo::create([
                'product_id' => $product->id,
                'image_pathe' => $imagePath,
                'is_main' => 1,
            ]);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'تمت إضافة المنتج بنجاح');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image'
        ]);

        $imagePath = $product->image;

        if ($request->hasFile('image')) {


            if ($product->image) { //
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public'); //
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);


        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
    public function toggleStatus($id)
    {
        $product = Product::findOrFail($id);

        $product->status = $product->status == 1 ? 0 : 1;

        $product->save();

        return back();
    }
}
