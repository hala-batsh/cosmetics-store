<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    

    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }


    public function show($id)
    {



        $order = Order::with(['user', 'products'])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }


    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);


        $order->payment_status = $request->payment_status;
        $order->order_status = $request->order_status;

        $order->save();

        return back()->with('success', 'Order status updated successfully!');

        if (!auth()->user()->is_admin) {
            abort(403);
        }
    }
}
