@extends('layouts.app')

@section('content')
    <h1 class="page-title">
        <i class="bi bi-credit-card-fill"></i> Checkout
    </h1>

    <div class="checkout-container">

        <!-- معلومات الزبون -->
        <div class="checkout-box">
            <h3><i class="bi bi-person-fill"></i> Customer Information</h3>

            <input type="text" placeholder="Full Name">
            <input type="email" placeholder="Email Address">
            <input type="text" placeholder="Phone Number">
        </div>

        <!-- عنوان الشحن -->
        <div class="checkout-box">
            <h3><i class="bi bi-geo-alt-fill"></i> Shipping Address</h3>

            <input type="text" placeholder="City">
            <input type="text" placeholder="Street Address">
            <input type="text" placeholder="Postal Code">
        </div>

        <!-- ملخص الطلب -->
        <div class="checkout-box summary-box">
            <h3><i class="bi bi-receipt-cutoff"></i> Order Summary</h3>

            <p>Rose Lipstick × 1 <span>$25</span></p>
            <p>Soft Pink Blush × 2 <span>$60</span></p>

            <hr>

            <h4>Total: <span>$85</span></h4>

            <button class="btn place-order-btn">
                <i class="bi bi-bag-check-fill"></i> Place Order
            </button>
        </div>

    </div>
@endsection
