<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Delivery;

class CartController extends Controller
{


    // إضافة المنتج إلى السلة
    public function add($id)
    {

        // جلب المنتج من قاعدة البيانات
        $product = Product::find($id);



        // التأكد أن المنتج متاح للبيع
        // إذا كان غير فعال أو المخزون فارغ لا يسمح بالإضافة

        if ($product->status == 0 || $product->stock <= 0) {

            return redirect()->back()
                ->with('error', 'This product is not available');
        }



        // جلب السلة الحالية من الـ session
        $cart = session()->get('cart', []);




        // إذا كان المنتج موجود مسبقاً في السلة
        // فقط نزيد الكمية

        if (isset($cart[$id])) {


            $cart[$id]['quantity']++;
        } else {



            // تحديد السعر الذي سيتم اعتماده في السلة
            // إذا كان يوجد سعر خصم نستخدمه
            // إذا لا يوجد خصم نستخدم السعر الأساسي

            $finalPrice = $product->discount_price
                ? $product->discount_price
                : $product->price;




            // إضافة المنتج لأول مرة إلى السلة

            $cart[$id] = [

                // اسم المنتج
                "name" => $product->name,


                // السعر النهائي (بعد الخصم إذا وجد)
                "price" => $finalPrice,


                // حفظ السعر القديم لعرضه إذا كان هناك خصم
                "old_price" => $product->price,


                // الكمية الافتراضية
                "quantity" => 1

            ];
        }



        // حفظ السلة داخل الـ session

        session()->put('cart', $cart);



        // الانتقال إلى صفحة السلة

        return redirect()->route('cart.index');
    }





    // عرض صفحة السلة

    public function index()
    {

        $cart = session()->get('cart', []);

        return view('user.cart', compact('cart'));
    }





    // زيادة كمية المنتج

    public function increase($id)
    {

        $cart = session()->get('cart');


        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;
        }


        session()->put('cart', $cart);


        return redirect()->back();
    }





    // إنقاص كمية المنتج

    public function decrease($id)
    {

        $cart = session()->get('cart');


        if (isset($cart[$id])) {


            // لا نسمح أن تصبح الكمية أقل من 1

            if ($cart[$id]['quantity'] > 1) {

                $cart[$id]['quantity']--;
            }
        }


        session()->put('cart', $cart);


        return redirect()->back();
    }





    // حذف المنتج من السلة

    public function remove($id)
    {

        $cart = session()->get('cart');


        if (isset($cart[$id])) {

            unset($cart[$id]);
        }


        session()->put('cart', $cart);


        return redirect()->back();
    }





    // الانتقال إلى صفحة الدفع

    public function checkout(Request $request)
    {


        $companies = Delivery::all();


        return view('user.checkout', compact('companies'));



        $cart = session()->get('cart', []);


        $companies = Delivery::where('status', 1)->get();



        $selectedCompanyId = $request->query(
            'shipping_company_id',
            old('shipping_company_id')
        );



        $deliveryPrice = 0;



        if ($selectedCompanyId) {


            $company = Delivery::find($selectedCompanyId);


            if ($company) {

                $deliveryPrice = $company->{'delivery-price'};
            }
        }



        return view('user.checkout', compact(
            'cart',
            'companies',
            'selectedCompanyId',
            'deliveryPrice'
        ));
    }
}
