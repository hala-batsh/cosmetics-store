@extends('layouts.app')

@section('content')
    <h1 class="page-title">Our Products</h1>

    <div class="products-grid">

        <div class="product-card1">
            <img src="https://placehold.co/300x300/png?text=Product" alt="">
            <h3>Rose Lipstick</h3>
            <p class="price">$25</p>
            <a href="{{ route('product.details', 1) }}" class="btn">View Details</a>
        </div>

        <div class="product-card1">
            <img src="https://placehold.co/300x300/png?text=Product" alt="">
            <h3>Pink Blush</h3>
            <p class="price">$30</p>
            <a href="{{ route('product.details', 2) }}" class="btn">View Details</a>
        </div>

        <div class="product-card1">
            <img src="https://placehold.co/300x300/png?text=Product" alt="">
            <h3>Face Cream</h3>
            <p class="price">$40</p>
            <a href="{{ route('product.details', 3) }}" class="btn">View Details</a>
        </div>

        <div class="product-card1">
            <img src="https://placehold.co/300x300/png?text=Product" alt="">
            <h3>Mascara</h3>
            <p class="price">$22</p>
            <a href="{{ route('product.details', 4) }}" class="btn">View Details</a>
        </div>

        <div class="product-card1">
            <img src="https://placehold.co/300x300/png?text=Product" alt="">
            <h3>Nail Polish</h3>
            <p class="price">$15</p>
            <a href="{{ route('product.details', 5) }}" class="btn">View Details</a>
        </div>

        <div class="product-card1">
            <img src="https://placehold.co/300x300/png?text=Product" alt="">
            <h3>Perfume</h3>
            <p class="price">$55</p>
            <a href="{{ route('product.details', 6) }}" class="btn">View Details</a>
        </div>

    </div>
@endsection
