@extends('layouts.app')

@section('content')
    <div class="lux-order-confirmation">

        {{-- خلفية زخرفية --}}
        <div class="lux-order-glow lux-order-glow-top"></div>
        <div class="lux-order-glow lux-order-glow-bottom"></div>

        <div class="lux-order-wrapper">


            {{-- بطاقة النجاح --}}
            <div class="lux-order-card">

                <div class="lux-order-inner-star">
                    <i class="bi bi-stars"></i>
                </div>
                {{-- أيقونة النجاح --}}
                <div class="lux-order-success-symbol">

                    <div class="lux-order-success-ring">

                        <i class="bi bi-check-lg"></i>

                    </div>

                    <span class="lux-order-particle lux-particle-1">✦</span>
                    <span class="lux-order-particle lux-particle-2">✦</span>
                    <span class="lux-order-particle lux-particle-3">·</span>

                </div>


                {{-- العنوان --}}
                <div class="lux-order-heading">

                    <span class="lux-order-kicker">
                        تم تأكيد طلبكِ
                    </span>

                    <h1>
                        شكراً لاختياركِ لنا
                    </h1>

                    <p>
                        تم استلام طلبكِ بنجاح، وبدأنا بتجهيزه
                        <br>
                        بكل عناية ليصل إليكِ بأجمل صورة.
                    </p>

                </div>


                {{-- رقم الطلب --}}
                <div class="lux-order-number">

                    <span>
                        رقم الطلب
                    </span>

                    <strong>
                        #{{ $id }}
                    </strong>

                    <i class="bi bi-check-circle-fill"></i>

                </div>


                {{-- رسالة التجهيز --}}
                <div class="lux-order-preparation">

                    <div class="lux-order-preparation-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="lux-order-preparation-content">

                        <strong>
                            طلبكِ قيد التجهيز
                        </strong>

                        <span>
                            سنقوم بتجهيز منتجاتكِ بعناية وتجهيزها للتوصيل.
                        </span>

                    </div>

                </div>


                {{-- الأزرار --}}
                <div class="lux-order-actions">

                    <a href="{{ route('orders.show', $id) }}" class="lux-order-action lux-order-action-primary">

                        <i class="bi bi-receipt"></i>

                        <span>
                            عرض تفاصيل الطلب
                        </span>

                        <i class="bi bi-arrow-left lux-order-action-arrow"></i>

                    </a>


                    <a href="{{ route('home') }}" class="lux-order-action lux-order-action-secondary">

                        <i class="bi bi-bag-heart"></i>

                        <span>
                            متابعة التسوق
                        </span>

                    </a>

                </div>


                {{-- أسفل البطاقة --}}
                <div class="lux-order-trust">

                    <span class="lux-order-trust-line"></span>

                    <div>

                        <i class="bi bi-shield-check"></i>

                        <span>
                            تجربة شراء آمنة وموثوقة
                        </span>

                    </div>

                    <span class="lux-order-trust-line"></span>

                </div>

            </div>


            {{-- عبارة أسفل البطاقة --}}
            <p class="lux-order-bottom-text">
                نعتز بثقتكِ بنا ♥
            </p>

        </div>

    </div>
@endsection
