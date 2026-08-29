<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Address;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->role === 'admin'
            ? Order::with(['products.photos', 'user'])->get()
            : Order::where('user_id', Auth::id())
            ->with(['products.photos'])
            ->get();

        return view('user.orders', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::with('products.photos')->findOrFail($id);

        if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('user.view-order', compact('order'));
    }


    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty!');
        }

        $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'postal_code' => 'required|string|max:10',
            'shipping_company_id' => 'nullable|exists:delivery_companies_table,id',
            'delivery_price' => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {


            $address = Address::create([
                'user_id' => Auth::id(),
                'street' => $request->street,
                'city' => $request->city,
                'area' => $request->postal_code,
                'phone' => $request->phone,
                'is_default' => false,
            ]);


            $request->validate([
                'delivery_company_id' => 'required',
            ]);

            $deliveryId = $request->delivery_company_id;

            $deliveryPrice = 0;

            if ($deliveryId) {
                $deliveryCompany = Delivery::findOrFail($deliveryId);
                $deliveryPrice = $deliveryCompany->delivery_price;
            } elseif ($request->filled('delivery_price')) {
                $deliveryPrice = $request->delivery_price;
            }

            $subtotal = 0;


            $order = Order::create([
                'user_id' => Auth::id(),
                'address_id' => $address->id,
                'delivery_companies_table_id' => $deliveryId,
                'payment_method_id' => 'cash',
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'processing' => false,
                'delivery_price' => $deliveryPrice,
                'subtotal' => 0,
                'total_price' => 0,
            ]);


            foreach ($cart as $product_id => $item) {

                $product = Product::findOrFail($product_id);


                if ($product->stock < $item['quantity']) {
                    throw new \Exception('Not enough stock for product: ' . $product->name);
                }


                $product->stock = $product->stock - $item['quantity'];
                $product->save();

                $itemTotal = $product->price * $item['quantity'];

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price_at_order' => $product->price
                ]);

                $subtotal += $itemTotal;
            }


            $order->update([
                'subtotal' => $subtotal,
                'total_price' => $subtotal + $deliveryPrice,
            ]);
            DB::commit();


            $request->session()->forget('cart');

            return redirect()->route('order.success', $order->id)
                ->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }


    public function updateStatus(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'order_status' => 'required|in:pending,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['order_status' => $request->order_status]);

        return redirect()->back()->with('success', 'Order status updated!');
    }
}
