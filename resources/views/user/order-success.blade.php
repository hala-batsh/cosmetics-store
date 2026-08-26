@extends('layouts.app')

@section('content')
    <h1 class="page-title">
        <i class="bi bi-check-circle-fill"></i> Order Successful
    </h1>

    <div class="success-container">

        <div class="success-card">

            <i class="bi bi-bag-heart-fill success-icon"></i>

            <h2>Thank You for Your Order!</h2>

            <p>
                Your order has been placed successfully.<br>
                We are preparing your items with love
            </p>

            <div class="success-actions">
                <a href="/" class="btn">
                    <i class="bi bi-arrow-left-circle"></i> Continue Shopping
                </a>

                <a href="{{ route('orders.show', $id) }}" class="btn">
                    <i class="bi bi-receipt"></i> View Order
                </a>
            </div>

        </div>

    </div>
@endsection
