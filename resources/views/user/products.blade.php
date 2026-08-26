@extends('layouts.app')

@section('content')
    {{-- =====================================================
     PRODUCTS HERO
===================================================== --}}

    <section class="page-hero">

        <div class="page-hero-content">


            <h1>
                اكتشفي
                <span>منتجاتنا</span>
            </h1>

            <p class="page-description">
                اكتشفي مجموعتنا المختارة بعناية من مستحضرات التجميل
                التي تجمع بين الجودة والأناقة لتمنحكِ ما تستحقينه.
            </p>

        </div>

    </section>


    {{-- =====================================================
     PRODUCTS SECTION
===================================================== --}}

    <section class="products-page">

        <div class="products-heading">

            <div>
                <p>NEWE COLLECTION</p>

                <h2>
                    مجموعة المنتجات التي وفرناها لكِ

                </h2>
            </div>

            <span class="products-count">
                {{ $products->count() }} منتج
            </span>

        </div>


        {{-- =====================================================
         PRODUCTS GRID
    ===================================================== --}}

        <div class="products-page-grid">

            @forelse ($products as $product)
                <div class="beauty-product-card">

                    {{-- Product Image --}}

                    <div class="product-image">

                        @if ($product->photos->first())
                            <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                                alt="{{ $product->name }}">
                        @else
                            <div class="no-image">

                                <i class="bi bi-image"></i>

                                <span>لا توجد صورة</span>

                            </div>
                        @endif


                        {{-- Wishlist --}}

                        <button class="wishlist-btn" type="button">

                            <i class="bi bi-heart"></i>

                        </button>

                    </div>


                    {{-- Product Information --}}

                    <div class="product-info">

                        <h3>
                            {{ $product->name }}
                        </h3>


                        {{-- Rating --}}

                        <div class="product-rating">

                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>

                        </div>


                        {{-- Price --}}

                        <p class="product-price">

                            ${{ number_format($product->price, 2) }}

                        </p>


                        {{-- Details Button --}}

                        <a href="{{ route('products.show', $product->id) }}" class="product-btn">
                            تفاصيل المنتج

                            <i class="bi bi-arrow-left"></i>

                        </a>

                    </div>

                </div>

            @empty

                <div class="empty-products">

                    <i class="bi bi-bag-x"></i>

                    <h3>
                        لا توجد منتجات حاليًا
                    </h3>

                    <p>
                        سيتم إضافة المنتجات قريبًا.
                    </p>

                </div>
            @endforelse

        </div>

    </section>
@endsection
