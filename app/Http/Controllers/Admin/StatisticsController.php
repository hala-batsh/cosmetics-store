<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $products = Product::count();

        $soldProducts = DB::table('order_product')->sum('quantity');

        $deliveredOrders = Order::where('order_status', 'delivered')->count();

        $shippedOrders = Order::where('order_status', 'shipped')->count();

        $pendingOrders = Order::where('order_status', 'pending')->count();

        $revenue = Order::where('order_status', 'delivered')->sum('total_price');

        return view('admin.statistics', compact(
            'products',
            'soldProducts',
            'deliveredOrders',
            'shippedOrders',
            'pendingOrders',
            'revenue'
        ));
    }
}
