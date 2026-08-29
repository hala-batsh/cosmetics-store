@extends('layouts.app')

@section('content')
    @php

        /*
    |--------------------------------------------------------------------------
    | حساب مجموع المنتجات
    |--------------------------------------------------------------------------
    */

        $productsTotal = 0;

        foreach ($order->products as $product) {
            $productTotal = $product->pivot->quantity * $product->pivot->price_at_order;
            $productsTotal += $productTotal;
        }

        /*
    |--------------------------------------------------------------------------
    | أجور التوصيل
    |--------------------------------------------------------------------------
    */

        $deliveryPrice = $order->delivery_price ?? 0;

        /*
    |--------------------------------------------------------------------------
    | حالة الطلب
    |--------------------------------------------------------------------------
    */

        $status = $order->order_status;

        $statusArabic = match ($status) {
            'pending' => 'قيد الانتظار',
            'processing' => 'قيد التجهيز',
            'shipped' => 'تم الشحن',
            'delivered' => 'تم التوصيل',
            'cancelled' => 'ملغى',
            default => $status ?: 'غير محددة',
        };

        /*
    |--------------------------------------------------------------------------
    | حالة الدفع
    |--------------------------------------------------------------------------
    */

        $paymentStatus = $order->payment_status;

        $paymentStatusArabic = match ($paymentStatus) {
            'pending' => 'بانتظار الدفع',
            'paid' => 'تم الدفع',
            'completed' => 'تم الدفع',
            'failed' => 'فشل الدفع',
            'cancelled' => 'ملغى',
            default => $paymentStatus ?: 'غير محددة',
        };

        /*
    |--------------------------------------------------------------------------
    | طريقة الدفع
    |--------------------------------------------------------------------------
    */

        $paymentMethod = $order->payment_method_id;

        $paymentMethodArabic = match ($paymentMethod) {
            'cash' => 'الدفع عند الاستلام',
            'card' => 'الدفع بالبطاقة',
            'online' => 'الدفع الإلكتروني',
            default => $paymentMethod ?: 'غير محددة',
        };

    @endphp


    <div class="cart-page">


        {{-- =====================================================
         عنوان الصفحة
    ===================================================== --}}

        <h1 class="page-title">

            <i class="bi bi-receipt-cutoff"></i>

            تفاصيل الطلب

        </h1>


        <div class="cart-container">


            {{-- =====================================================
             معلومات الطلب
        ===================================================== --}}

            <div class="cart-item order-information">

                <div class="cart-info">

                    <span class="order-section-label">
                        معلومات الطلب
                    </span>

                    <h3>
                        تفاصيل طلبكِ
                    </h3>


                    <div class="order-details-grid">


                        {{-- رقم الطلب --}}

                        <div class="order-detail-box">

                            <div class="order-detail-icon">
                                <i class="bi bi-hash"></i>
                            </div>

                            <div>

                                <span>
                                    رقم الطلب
                                </span>

                                <strong>
                                    #{{ $order->id }}
                                </strong>

                            </div>

                        </div>


                        {{-- تاريخ الطلب --}}

                        <div class="order-detail-box">

                            <div class="order-detail-icon">
                                <i class="bi bi-calendar3"></i>
                            </div>

                            <div>

                                <span>
                                    تاريخ الطلب
                                </span>

                                <strong>
                                    {{ $order->created_at->format('d/m/Y') }}
                                </strong>

                            </div>

                        </div>


                        {{-- حالة الطلب --}}

                        <div class="order-detail-box">

                            <div class="order-detail-icon">
                                <i class="bi bi-truck"></i>
                            </div>

                            <div>

                                <span>
                                    حالة الطلب
                                </span>

                                <strong class="order-status">
                                    {{ $statusArabic }}
                                </strong>

                            </div>

                        </div>


                        {{-- طريقة الدفع --}}

                        <div class="order-detail-box">

                            <div class="order-detail-icon">
                                <i class="bi bi-wallet2"></i>
                            </div>

                            <div>

                                <span>
                                    طريقة الدفع
                                </span>

                                <strong>
                                    {{ $paymentMethodArabic }}
                                </strong>

                            </div>

                        </div>


                        {{-- حالة الدفع --}}

                        <div class="order-detail-box">

                            <div class="order-detail-icon">
                                <i class="bi bi-credit-card-2-front-fill"></i>
                            </div>

                            <div>

                                <span>
                                    حالة الدفع
                                </span>

                                <strong class="order-status">
                                    {{ $paymentStatusArabic }}
                                </strong>

                            </div>

                        </div>


                    </div>

                </div>

            </div>



            {{-- =====================================================
             بيانات العميل
        ===================================================== --}}

            <div class="order-extra-card">

                <div class="order-section-heading">

                    <div>

                        <span class="order-section-label">
                            بيانات العميل
                        </span>

                        <h2>
                            معلومات التواصل
                        </h2>

                    </div>

                    <i class="bi bi-person-heart"></i>

                </div>


                <div class="customer-details-grid">


                    {{-- الاسم --}}

                    <div class="customer-detail">

                        <div class="customer-detail-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div>

                            <span>
                                الاسم الكامل
                            </span>

                            <strong>
                                {{ $order->user->name ?? 'غير متوفر' }}
                            </strong>

                        </div>

                    </div>


                    {{-- البريد --}}

                    <div class="customer-detail">

                        <div class="customer-detail-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>

                        <div>

                            <span>
                                البريد الإلكتروني
                            </span>

                            <strong>
                                {{ $order->user->email ?? 'غير متوفر' }}
                            </strong>

                        </div>

                    </div>


                    {{-- الهاتف --}}

                    <div class="customer-detail">

                        <div class="customer-detail-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>

                        <div>

                            <span>
                                رقم الهاتف
                            </span>

                            <strong>
                                {{ $order->address->phone ?? 'غير متوفر' }}
                            </strong>

                        </div>

                    </div>


                </div>

            </div>



            {{-- =====================================================
             عنوان التوصيل
        ===================================================== --}}

            <div class="order-extra-card">

                <div class="order-section-heading">

                    <div>

                        <span class="order-section-label">
                            العنوان الذي تفضلين استلام طلبك فيه
                        </span>

                        <h2>
                            تفاصيل عنوان التوصيل
                        </h2>

                    </div>

                    <i class="bi bi-geo-alt-fill"></i>

                </div>


                <div class="shipping-details">


                    {{-- المدينة --}}

                    <div class="shipping-detail">

                        <i class="bi bi-building"></i>

                        <div>

                            <span>
                                المدينة
                            </span>

                            <strong>
                                {{ $order->address->city ?? 'غير متوفر' }}
                            </strong>

                        </div>

                    </div>


                    {{-- العنوان --}}

                    <div class="shipping-detail">

                        <i class="bi bi-signpost-2-fill"></i>

                        <div>

                            <span>
                                الحي
                            </span>

                            <strong>
                                {{ $order->address->street ?? 'غير متوفر' }}
                            </strong>

                        </div>

                    </div>


                    {{-- الرمز البريدي --}}

                    <div class="shipping-detail">

                        <i class="bi bi-mailbox2"></i>

                        <div>

                            <span>
                                رقم البناء
                            </span>

                            <strong>
                                {{ $order->address->area ?? 'غير متوفر' }}
                            </strong>

                        </div>

                    </div>


                </div>

            </div>



            {{-- =====================================================
             شركة الشحن
        ===================================================== --}}

            <div class="order-extra-card">

                <div class="order-section-heading">

                    <div>

                        <span class="order-section-label">
                            التوصيل
                        </span>

                        <h2>
                            معلومات الشحن
                        </h2>

                    </div>

                    <i class="bi bi-truck-front-fill"></i>

                </div>


                <div class="shipping-company-box">


                    <div class="shipping-company-icon">

                        <i class="bi bi-box-seam-fill"></i>

                    </div>


                    <div class="shipping-company-info">

                        <span>
                            شركة الشحن
                        </span>

                        <strong>
                            {{ optional(\App\Models\Delivery::find($order->delivery_companies_table_id))->name_company ?? 'غير متوفرة' }}
                        </strong>


                    </div>


                    <div class="shipping-company-price">

                        <span>
                            أجور التوصيل
                        </span>

                        <strong>
                            ${{ number_format($deliveryPrice, 2) }}
                        </strong>

                    </div>


                </div>

            </div>



            {{-- =====================================================
             المنتجات
        ===================================================== --}}

            <div class="order-products">

                <div class="order-section-heading">

                    <div>

                        <span class="order-section-label">
                            محتويات الطلب
                        </span>

                        <h2>
                            المنتجات المطلوبة
                        </h2>

                    </div>

                    <i class="bi bi-bag-heart-fill"></i>

                </div>


                @foreach ($order->products as $product)
                    <div class="cart-item">


                        {{-- صورة المنتج --}}

                        <div class="cart-product-image">

                            @if ($product->photos->first())
                                <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                                    alt="{{ $product->name }}">
                            @else
                                <div class="product-no-image">

                                    <i class="bi bi-image"></i>

                                </div>
                            @endif

                        </div>


                        {{-- معلومات المنتج --}}

                        <div class="cart-info">

                            <h3>
                                {{ $product->name }}
                            </h3>


                            <p class="price">

                                <i class="bi bi-tag-fill"></i>

                                سعر القطعة:

                                <strong>
                                    ${{ number_format($product->pivot->price_at_order, 2) }}
                                </strong>

                            </p>


                            <div class="quantity">

                                <span>
                                    الكمية
                                </span>

                                <strong>
                                    {{ $product->pivot->quantity }}
                                </strong>

                            </div>


                            <p class="price">

                                <i class="bi bi-calculator-fill"></i>

                                مجموع المنتج:

                                <strong>
                                    ${{ number_format($product->pivot->quantity * $product->pivot->price_at_order, 2) }}
                                </strong>

                            </p>

                        </div>

                    </div>
                @endforeach

            </div>



            {{-- =====================================================
             ملخص الأسعار
        ===================================================== --}}

            <div class="order-price-summary">


                <div class="summary-heading">

                    <span>
                        ملخص الدفع
                    </span>

                    <i class="bi bi-wallet2"></i>

                </div>


                <div class="summary-row">

                    <span>
                        مجموع المنتجات
                    </span>

                    <strong>
                        ${{ number_format($productsTotal, 2) }}
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        أجور التوصيل
                    </span>

                    <strong>
                        ${{ number_format($deliveryPrice, 2) }}
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        طريقة الدفع
                    </span>

                    <strong>
                        {{ $paymentMethodArabic }}
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        حالة الدفع
                    </span>

                    <strong>
                        {{ $paymentStatusArabic }}
                    </strong>

                </div>


                <div class="summary-divider"></div>


                <div class="summary-final">

                    <div>

                        <span>
                            المجموع النهائي
                        </span>

                        <small>
                            شامل أجور التوصيل
                        </small>

                    </div>

                    <strong>
                        ${{ number_format($order->total_price ?? $productsTotal + $deliveryPrice, 2) }}
                    </strong>

                </div>


            </div>



            {{-- =====================================================
             زر العودة
        ===================================================== --}}

            <div class="order-details-bottom">

                <a href="{{ route('home') }}" class="checkout-btn">

                    <i class="bi bi-house-heart-fill"></i>

                    العودة إلى الرئيسية

                    <i class="bi bi-arrow-left"></i>

                </a>

            </div>


        </div>

    </div>
@endsection
