@extends('layouts.app')

@section('content')
    <h1 class="page-title">
        <i class="bi bi-receipt"></i> Order Details
    </h1>

    <div class="cart-container">

       
        <div class="cart-item">
            <div class="cart-info">
                <h3>Order Information</h3>

                <p class="price">Order Number: #{{ $order->id }}</p>
                <p class="price">Date: {{ $order->created_at->format('d M Y') }}</p>
                <p class="price">Status: {{ $order->order_status }}</p>
            </div>
        </div>

        <!-- المنتجات -->
        <div class="order-products">

            @foreach ($order->products as $product)
                <div class="cart-item">


                    @if ($product->photos->first())
                        <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}" alt="Product"
                            style="max-width: 120px; max-height: 120px;">
                    @else
                        <img src="https://placehold.co/120x120/png?text=Product" alt="Product">
                    @endif

                    <div class="cart-info">
                        <h3>{{ $product->name }}</h3>

                        <p class="price">
                            Price: ${{ $product->pivot->price_at_order }}
                        </p>

                        <div class="quantity">
                            <span>Quantity:</span>
                            <strong>{{ $product->pivot->quantity }}</strong>
                        </div>


                        <p class="price">
                            Subtotal: ${{ $product->pivot->quantity * $product->pivot->price_at_order }}
                        </p>

                    </div>
                </div>
            @endforeach

        </div>


        <div class="cart-summary">
            <h3>
                Total: <span>${{ $order->total_price ?? 0 }}</span>
            </h3>

            <a href="{{ route('home') }}" class="checkout-btn">
                <i class="bi bi-house-fill"></i> Back to Home
            </a>
        </div>

    </div>
@endsection
