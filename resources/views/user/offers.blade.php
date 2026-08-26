@extends('layouts.app')

@section('content')
    <section class="page-hero">

        <div class="page-hero-content">


            <h1>
                اكتشفي
                <span> عروضنا</span>
            </h1>

            <p class="page-description">
                اختاري منتجاتك المفضلة باسعار مميزة لفترة محدودة
            </p>

        </div>

    </section>




    {{-- Products --}}

    <div class="products-grid offers-grid">


        @foreach ($products as $product)
            <div class="beauty-product-card offer-card">


                <div class="product-image">


                    @if ($product->photos->first())
                        <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                            alt="{{ $product->name }}">
                    @else
                        <div class="no-image">

                            <i class="bi bi-image"></i>

                        </div>
                    @endif







                    <button class="wishlist-btn">

                        <i class="bi bi-heart"></i>

                    </button>


                </div>




                <div class="product-info">


                    <h3>
                        {{ $product->name }}
                    </h3>



                    <div class="product-rating">

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>

                    </div>




                    <div class="offer-price">


                        <del>
                            ${{ number_format($product->price, 2) }}
                        </del>


                        <strong>

                            ${{ number_format($product->discount_price, 2) }}

                        </strong>


                    </div>




                    <a href="{{ route('products.show', $product->id) }}" class="product-btn">

                        تفاصيل المنتج

                    </a>



                </div>


            </div>
        @endforeach



    </div>


    </section>
@endsection
