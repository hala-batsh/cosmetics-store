<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {


        $categories = Category::where('status', 1)->get();

        return view('user.categories.index', compact('categories'));
    }

    public function products($id) 
    {
        $category = Category::with('products')->findOrFail($id);

        return view('user.categories.products', compact('category'));
    }
}
