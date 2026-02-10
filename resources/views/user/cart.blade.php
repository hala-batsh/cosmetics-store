@extends('layouts.app')

@section('content')
    <h1 class="page-title">
        <i class="bi bi-bag-heart-fill"></i> My Cart
    </h1>

    <div class="cart-container">

        <!-- كرت منتج -->
        <div class="cart-item">
            <img src="https://placehold.co/120x120/png?text=Product" alt="Product">

            <div class="cart-info">
                <h3>Rose Lipstick</h3>
                <p class="price">$25</p>

                <div class="quantity">
                    <button><i class="bi bi-dash-circle"></i></button>
                    <span>1</span>
                    <button><i class="bi bi-plus-circle"></i></button>
                </div>
            </div>

            <button class="remove-btn">
                <i class="bi bi-trash3-fill"></i>
            </button>
        </div>

        <!-- كرت منتج -->
        <div class="cart-item">
            <img src="https://placehold.co/120x120/png?text=Product" alt="Product">

            <div class="cart-info">
                <h3>Soft Pink Blush</h3>
                <p class="price">$30</p>

                <div class="quantity">
                    <button><i class="bi bi-dash-circle"></i></button>
                    <span>2</span>
                    <button><i class="bi bi-plus-circle"></i></button>
                </div>
            </div>

            <button class="remove-btn">
                <i class="bi bi-trash3-fill"></i>
            </button>
        </div>

        <!-- المجموع -->
        <div class="cart-summary">
            <h3>Total: <span>$85</span></h3>
            <a href="{{ route('cart.checkout') }}" class="btn checkout-btn">
                <i class="bi bi-credit-card-fill"></i> Checkout
            </a>
        </div>

    </div>
@endsection
