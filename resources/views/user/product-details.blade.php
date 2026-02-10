@extends('layouts.app')

@section('content')
    <h1 class="page-title">Product Details</h1>

    <div class="content">
        <div class="product-card">
            <img src="https://placehold.co/400x400/png?text=Product+Image" alt="Product">
            <h2>{{ $product['name'] ?? 'Product Name' }}</h2>
            <p class="price">${{ $product['price'] ?? '0' }}</p>
            <p class="description">{{ $product['description'] ?? 'No description available.' }}</p>
            <form action="{{ route('cart.add', $product['id']) }}" method="POST"> @csrf
                <button type="submit" class="btn add-to-cart-btn">
                    <i class="bi bi-cart-plus-fill"></i>
                    Add to Cart </button>
            </form>

        </div>
    </div>
@endsection
