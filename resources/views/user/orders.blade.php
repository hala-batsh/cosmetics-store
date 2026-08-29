@extends('layouts.app')

@section('content')

    <div class="lux-orders-page">

        {{-- زخارف الخلفية --}}
        <div class="lux-orders-glow lux-orders-glow-one"></div>
        <div class="lux-orders-glow lux-orders-glow-two"></div>
        <div class="lux-orders-star lux-orders-star-one">✦</div>
        <div class="lux-orders-star lux-orders-star-two">✧</div>

        <div class="lux-orders-wrapper">

            {{-- عنوان الصفحة --}}
            <div class="lux-orders-header">

                <span class="lux-orders-kicker">
                    <i class="bi bi-stars"></i>
                    رحلتكِ معنا
                </span>

                <h1>
                    طلباتي
                </h1>

                <p>
                    تابعي جميع طلباتكِ وتفاصيل مشترياتكِ بكل سهولة
                </p>

                <div class="lux-orders-title-line"></div>

            </div>


            {{-- في حال ما في طلبات --}}
            @if ($orders->isEmpty())
                <div class="lux-orders-empty">

                    <div class="lux-orders-empty-icon">
                        <i class="bi bi-bag-x"></i>
                    </div>

                    <h2>
                        لا توجد طلبات حتى الآن
                    </h2>

                    <p>
                        يبدو أن خزانة جمالكِ بانتظار أول طلب لكِ ✨
                    </p>

                    <a href="{{ route('home') }}" class="lux-orders-main-btn">
                        <i class="bi bi-bag-heart"></i>
                        ابدئي التسوق
                        <i class="bi bi-arrow-left"></i>
                    </a>

                </div>
            @else
                {{-- عدد الطلبات --}}
                <div class="lux-orders-count">

                    <div>
                        <i class="bi bi-bag-check-fill"></i>

                        <span>
                            لديكِ
                            <strong>{{ $orders->count() }}</strong>
                            {{ $orders->count() == 1 ? 'طلب' : 'طلبات' }}
                        </span>
                    </div>

                    <span>
                        الأحدث أولاً
                    </span>

                </div>


                {{-- الطلبات --}}
                <div class="lux-orders-list">

                    @foreach ($orders as $order)
                        @php

                            $statusArabic = match ($order->order_status) {
                                'pending' => 'قيد الانتظار',

                                'processing' => 'قيد التجهيز',

                                'shipped' => 'تم الشحن',

                                'delivered' => 'تم التوصيل',

                                'cancelled' => 'ملغى',

                                default => $order->order_status,
                            };

                            $paymentArabic = match ($order->payment_status) {
                                'pending' => 'قيد الانتظار',

                                'paid' => 'تم الدفع',

                                'failed' => 'فشل الدفع',

                                'refunded' => 'تم استرداد المبلغ',

                                default => $order->payment_status ?? 'غير محدد',
                            };

                            $paymentMethod = match ($order->payment_method_id) {
                                'cash' => 'الدفع عند الاستلام',

                                default => $order->payment_method_id ?? 'غير محدد',
                            };

                            $productsCount = $order->products->sum(fn($product) => $product->pivot->quantity);

                        @endphp


                        <div class="lux-orders-card">


                            {{-- الشريط العلوي --}}
                            <div class="lux-orders-card-top">

                                <div class="lux-orders-number">

                                    <span>
                                        رقم الطلب
                                    </span>

                                    <strong>
                                        #{{ $order->id }}
                                    </strong>

                                </div>


                                <div
                                    class="lux-orders-status
                                lux-status-{{ $order->order_status }}">

                                    <span></span>

                                    {{ $statusArabic }}

                                </div>

                            </div>


                            {{-- معلومات أساسية --}}
                            <div class="lux-orders-info-grid">


                                <div class="lux-orders-info">

                                    <div class="lux-orders-info-icon">
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


                                <div class="lux-orders-info">

                                    <div class="lux-orders-info-icon">
                                        <i class="bi bi-bag-heart"></i>
                                    </div>

                                    <div>

                                        <span>
                                            المنتجات
                                        </span>

                                        <strong>
                                            {{ $productsCount }} قطعة
                                        </strong>

                                    </div>

                                </div>


                                <div class="lux-orders-info">

                                    <div class="lux-orders-info-icon">
                                        <i class="bi bi-truck"></i>
                                    </div>

                                    <div>

                                        <span>
                                            التوصيل
                                        </span>

                                        <strong>
                                            ${{ number_format($order->delivery_price ?? 0, 2) }}
                                        </strong>

                                    </div>

                                </div>


                                <div class="lux-orders-info">

                                    <div class="lux-orders-info-icon">
                                        <i class="bi bi-credit-card"></i>
                                    </div>

                                    <div>

                                        <span>
                                            طريقة الدفع
                                        </span>

                                        <strong>
                                            {{ $paymentMethod }}
                                        </strong>

                                    </div>

                                </div>

                            </div>


                            {{-- معلومات الدفع --}}
                            <div class="lux-orders-payment">

                                <div>

                                    <i class="bi bi-shield-check"></i>

                                    <span>
                                        حالة الدفع
                                    </span>

                                </div>

                                <strong>
                                    {{ $paymentArabic }}
                                </strong>

                            </div>


                            {{-- المنتجات المصغرة --}}
                            <div class="lux-orders-products">

                                @foreach ($order->products->take(4) as $product)
                                    <div class="lux-orders-product">

                                        @if ($product->photos->first())
                                            <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <div class="lux-orders-no-image">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif

                                    </div>
                                @endforeach


                                @if ($order->products->count() > 4)
                                    <div class="lux-orders-more-products">
                                        +{{ $order->products->count() - 4 }}
                                    </div>
                                @endif

                            </div>


                            {{-- أسفل الكرت --}}
                            <div class="lux-orders-card-bottom">


                                <div class="lux-orders-total">

                                    <span>
                                        المجموع النهائي
                                    </span>

                                    <strong>
                                        ${{ number_format($order->total_price ?? 0, 2) }}
                                    </strong>

                                </div>


                                <a href="{{ route('orders.show', $order->id) }}" class="lux-orders-details-btn">

                                    <span>
                                        عرض تفاصيل الطلب
                                    </span>

                                    <i class="bi bi-arrow-left"></i>

                                </a>

                            </div>

                        </div>
                    @endforeach

                </div>
            @endif

        </div>

    </div>

@endsection
