@extends('layouts.app')

@section('content')
    <section class="page-hero">

        <div class="page-hero-content">

            <h1>

                <span>{{ $category->name }}</span>
            </h1>

            <p class="page-description">
                اكتشفي مجموعتنا المختارة من المنتجات ضمن هذا التصنيف
                للحصول على إطلالة مميزة تجمع بين الجمال والأناقة.
            </p>

        </div>

    </section>



    <section class="products-page">


        <div class="products-heading">

            <div>

                <p>CATEGORY</p>

                <h2>
                    {{ $category->name }}
                    <span>Collection</span>
                </h2>

            </div>


            <div class="products-count">

                {{ $category->products->count() }} Products

            </div>


        </div>




        <div class="products-page-grid">


            @forelse($category->products as $product)
                <div class="beauty-product-card">


                    <div class="product-image">


                        @if ($product->photos->first())
                            <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                                alt="{{ $product->name }}">
                        @else
                            <div class="no-image">

                                <i class="bi bi-image"></i>

                                <span>No Image</span>

                            </div>
                        @endif


                    </div>




                    <div class="product-info">


                        <h3>
                            {{ $product->name }}
                        </h3>




                        <p class="product-price">
                            ${{ $product->price }}
                        </p>




                        @if ($product->status == 0)
                            <div class="product-status not-available">

                                Product Not Available

                            </div>
                        @elseif($product->stock <= 0)
                            <div class="product-status out-stock">

                                Out of Stock

                            </div>
                        @else
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">

                                @csrf

                                <button type="submit" class="product-btn">

                                    <i class="bi bi-cart-plus-fill"></i>

                                    Add to Cart

                                </button>


                            </form>
                        @endif



                    </div>



                </div>


            @empty



                <div class="empty-products">

                    <i class="bi bi-box-seam"></i>

                    <h3>No Products Found</h3>

                    <p>
                        لا يوجد منتجات ضمن هذا التصنيف حالياً.
                    </p>

                </div>
            @endforelse



        </div>



    </section>
@endsection
