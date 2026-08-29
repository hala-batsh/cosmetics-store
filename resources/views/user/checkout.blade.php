@extends('layouts.app')

@section('content')

    {{-- =====================================================
         CHECKOUT HEADER
    ===================================================== --}}

    <div class="checkout-header">

        <span class="checkout-label">
            إتمام الطلب
        </span>

        <h1>
            <i class="bi bi-credit-card-fill"></i>
            إتمام الشراء
        </h1>

        <p>
            يجب ادخال بياناتك لكي يتم تاكيد طلبك والاستمتاع بتجربة شراء مميزة.
        </p>

    </div>


    @php
        $cart = session('cart', []);
        $subtotal = 0;
    @endphp


    @if (count($cart) > 0)
        <form action="{{ route('order.store') }}" method="POST">

            @csrf

            <div class="checkout-container">


                {{-- =================================================
                     CUSTOMER INFORMATION
                ================================================= --}}

                <div class="checkout-box">

                    <div class="checkout-box-title">

                        <div class="checkout-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div>
                            <span> البيانات الشخصية</span>
                            <h3>معلومات العميل</h3>
                        </div>

                    </div>


                    <div class="checkout-fields">

                        <div class="checkout-field">

                            <label>الاسم الكامل</label>

                            <div class="input-wrapper">

                                <i class="bi bi-person"></i>

                                <input type="text" name="name" placeholder="أدخلي اسمك الكامل" required>

                            </div>

                        </div>


                        <div class="checkout-field">

                            <label>البريد الإلكتروني</label>

                            <div class="input-wrapper">

                                <i class="bi bi-envelope"></i>

                                <input type="email" name="email" placeholder="أدخلي بريدك الإلكتروني" required>

                            </div>

                        </div>


                        <div class="checkout-field">

                            <label>رقم الهاتف</label>

                            <div class="input-wrapper">

                                <i class="bi bi-telephone"></i>

                                <input type="text" name="phone" placeholder="أدخلي رقم الهاتف" required>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     SHIPPING ADDRESS
                ================================================= --}}

                <div class="checkout-box">

                    <div class="checkout-box-title">

                        <div class="checkout-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <div>
                            <span>مكان التوصيل</span>
                            <h3>العنوان الذي ترغبين بستلام طلبك فيه</h3>
                        </div>

                    </div>


                    <div class="checkout-fields">

                        <div class="checkout-field">

                            <label>المدينة</label>

                            <div class="input-wrapper">

                                <i class="bi bi-building"></i>

                                <input type="text" name="city" placeholder="أدخلي اسم المدينة" required>

                            </div>

                        </div>


                        <div class="checkout-field">

                            <label>الحي</label>

                            <div class="input-wrapper">

                                <i class="bi bi-signpost-2"></i>

                                <input type="text" name="street" placeholder="أدخلي اسم الحي" required>

                            </div>

                        </div>


                        <div class="checkout-field">

                            <label>رقم البناء</label>

                            <div class="input-wrapper">

                                <i class="bi bi-mailbox"></i>

                                <input type="text" name="postal_code" placeholder="أدخلي رقم  المبنى" required>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     SHIPPING COMPANY
                ================================================= --}}

                <div class="checkout-box">

                    <div class="checkout-box-title">

                        <div class="checkout-icon">
                            <i class="bi bi-truck"></i>
                        </div>

                        <div>
                            <span>طريقة التوصيل</span>
                            <h3>شركات الشحن</h3>
                        </div>

                    </div>


                    <div class="checkout-field">

                        <label>اختاري شركة الشحن المناسبة</label>

                        <div class="input-wrapper select-wrapper">

                            <i class="bi bi-truck"></i>

                            <select id="shipping_company" name="delivery_company_id" required>

                                <option value="">
                                    اختاري شركة الشحن
                                </option>

                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" data-price="{{ $company->{'delivery_price'} }}">

                                        {{ $company->{'name_company'} }}
                                        — ${{ number_format($company->{'delivery_price'}, 2) }}

                                    </option>
                                @endforeach

                            </select>

                            <i class="bi bi-chevron-down select-arrow"></i>

                        </div>

                    </div>


                    <input type="hidden" id="delivery_price" name="delivery_price" value="0">

                </div>


                {{-- =================================================
                     ORDER SUMMARY
                ================================================= --}}

                <div class="checkout-box summary-box">

                    <div class="checkout-box-title">

                        <div class="checkout-icon">
                            <i class="bi bi-bag-heart-fill"></i>
                        </div>

                        <div>
                            <span>تفاصيل طلبك</span>
                            <h3>ملخص الطلب</h3>
                        </div>

                    </div>


                    <div class="summary-products">

                        @foreach ($cart as $productId => $item)
                            @php
                                $itemSubtotal = $item['price'] * $item['quantity'];
                                $subtotal += $itemSubtotal;
                            @endphp


                            <div class="summary-item">

                                <div class="summary-product-info">

                                    <div class="summary-product-icon">
                                        <i class="bi bi-bag"></i>
                                    </div>

                                    <div>

                                        <strong>
                                            {{ $item['name'] }}
                                        </strong>

                                        <span>
                                            الكمية: {{ $item['quantity'] }}
                                        </span>

                                    </div>

                                </div>


                                <strong class="summary-price">
                                    ${{ number_format($itemSubtotal, 2) }}
                                </strong>

                            </div>


                            <input type="hidden" name="products[{{ $productId }}][product_id]"
                                value="{{ $productId }}">

                            <input type="hidden" name="products[{{ $productId }}][quantity]"
                                value="{{ $item['quantity'] }}">
                        @endforeach

                    </div>


                    <div class="summary-divider"></div>


                    <div class="summary-total-row">

                        <span>
                            المجموع الفرعي
                        </span>

                        <strong id="subtotal">
                            ${{ number_format($subtotal, 2) }}
                        </strong>

                    </div>


                    <div class="summary-total-row">

                        <span>
                            تكلفة التوصيل
                        </span>

                        <strong id="delivery">
                            $0.00
                        </strong>

                    </div>


                    <div class="summary-final">

                        <div>

                            <span>
                                المجموع النهائي
                            </span>

                            <small>
                                شامل تكلفة التوصيل
                            </small>

                        </div>

                        <strong id="total">
                            ${{ number_format($subtotal, 2) }}
                        </strong>

                    </div>


                    <button type="submit" class="place-order-btn">

                        <i class="bi bi-bag-check-fill"></i>

                        تأكيد الطلب

                        <i class="bi bi-arrow-left"></i>

                    </button>


                    <div class="checkout-secure">

                        <i class="bi bi-shield-check"></i>

                        <span>
                            طلبك معنا بأمان وخصوصية
                        </span>

                    </div>

                </div>

            </div>

        </form>
    @else
        {{-- =====================================================
             EMPTY CART
        ===================================================== --}}

        <div class="empty-checkout">

            <div class="empty-checkout-icon">
                <i class="bi bi-bag-x"></i>
            </div>

            <h2>
                سلتك فارغة
            </h2>

            <p>
                لم تضيفي أي منتجات إلى سلتك بعد.
            </p>

            <a href="{{ '/' }}" class="empty-checkout-btn">

                <i class="bi bi-arrow-right"></i>

                العودة للتسوق

            </a>

        </div>
    @endif



    {{-- =====================================================
         CHECKOUT SCRIPT
    ===================================================== --}}

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const shippingSelect = document.getElementById("shipping_company");
            const deliveryInput = document.getElementById("delivery_price");
            const deliveryText = document.getElementById("delivery");
            const subtotalText = document.getElementById("subtotal");
            const totalText = document.getElementById("total");

            if (!shippingSelect) return;

            function calculateTotal() {

                const selected =
                    shippingSelect.options[shippingSelect.selectedIndex];

                let delivery = selected.dataset.price ?
                    parseFloat(selected.dataset.price) :
                    0;

                let subtotal =
                    parseFloat(
                        subtotalText.textContent.replace('$', '')
                    );

                let total = subtotal + delivery;

                deliveryInput.value = delivery.toFixed(2);

                deliveryText.textContent =
                    "$" + delivery.toFixed(2);

                totalText.textContent =
                    "$" + total.toFixed(2);
            }

            shippingSelect.addEventListener(
                "change",
                calculateTotal
            );

            calculateTotal();

        });
    </script>

@endsection
