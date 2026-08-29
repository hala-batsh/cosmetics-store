<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | الإحصائيات الرئيسية
        |--------------------------------------------------------------------------
        */

        // إجمالي المنتجات
        $products = Product::count();

        // إجمالي المنتجات المباعة
        $soldProducts = DB::table('order_product')->sum('quantity');

        // الطلبات حسب الحالة
        $deliveredOrders = Order::where('order_status', 'delivered')->count();

        $shippedOrders = Order::where('order_status', 'shipped')->count();

        $pendingOrders = Order::where('order_status', 'pending')->count();

        $processingOrders = Order::where('order_status', 'processing')->count();

        $completedOrders = Order::where('order_status', 'completed')->count();


        /*
        |--------------------------------------------------------------------------
        | الإيرادات
        |--------------------------------------------------------------------------
        */

        $revenue = Order::whereIn('order_status', [
            'delivered',
            'completed'
        ])->sum('total_price');


        /*
        |--------------------------------------------------------------------------
        | إجمالي الطلبات
        |--------------------------------------------------------------------------
        */

        $totalOrders = Order::count();


        /*
        |--------------------------------------------------------------------------
        | متوسط قيمة الطلب
        |--------------------------------------------------------------------------
        */

        $averageOrder = $totalOrders > 0
            ? Order::avg('total_price')
            : 0;


        /*
        |--------------------------------------------------------------------------
        | مبيعات الأشهر
        |--------------------------------------------------------------------------
        */

        $monthlySales = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total')
        )
            ->whereIn('order_status', [
                'delivered',
                'completed'
            ])
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();


        $months = [
            1 => 'يناير',
            2 => 'فبراير',
            3 => 'مارس',
            4 => 'أبريل',
            5 => 'مايو',
            6 => 'يونيو',
            7 => 'يوليو',
            8 => 'أغسطس',
            9 => 'سبتمبر',
            10 => 'أكتوبر',
            11 => 'نوفمبر',
            12 => 'ديسمبر',
        ];


        $salesLabels = [];
        $salesValues = [];


        foreach ($monthlySales as $sale) {

            $salesLabels[] = $months[$sale->month];

            $salesValues[] = (float) $sale->total;
        }


        /*
        |--------------------------------------------------------------------------
        | إرسال البيانات للواجهة
        |--------------------------------------------------------------------------
        */

        return view('admin.statistics', compact(
            'products',
            'soldProducts',
            'deliveredOrders',
            'shippedOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'revenue',
            'totalOrders',
            'averageOrder',
            'salesLabels',
            'salesValues'
        ));
    }
}
