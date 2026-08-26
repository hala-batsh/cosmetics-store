@extends('layouts.app')

@section('content')


    <section class="page-hero">

        <div class="page-hero-content">

            <h1>
                سلة
                <span>التسوق</span>
            </h1>

            <p class="page-description">
                راجعي منتجاتك المختارة وأكملي طلبك بسهولة للحصول على تجربة تسوق مميزة.
            </p>

        </div>

    </section>




    <section class="cart-page">


        @php

            $cart = session('cart', []);

            if (!is_array($cart)) {
                $cart = [];
            }

            $total = 0;

        @endphp





        @if (count($cart) > 0)
            <div class="cart-items">



                @foreach ($cart as $id => $item)
                    @php

                        $product = \App\Models\Product::find($id);

                        $subtotal = $item['price'] * $item['quantity'];

                        $total += $subtotal;

                    @endphp





                    <div class="cart-card">



                        <div class="cart-image">


                            @if ($product && $product->photos->first())
                                <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                                    alt="{{ $item['name'] }}">
                            @else
                                <img src="https://placehold.co/300x300" alt="{{ $item['name'] }}">
                            @endif


                        </div>





                        <div class="cart-info">


                            <h3>
                                {{ $item['name'] }}
                            </h3>




                            <p class="cart-price">


                                @if (isset($item['old_price']) && $item['old_price'] > $item['price'])
                                    <span class="old-price">

                                        ${{ $item['old_price'] }}

                                    </span>


                                    <span class="discount-price">

                                        ${{ $item['price'] }}

                                    </span>
                                @else
                                    <span>

                                        ${{ $item['price'] }}

                                    </span>
                                @endif


                            </p>





                            <div class="quantity-box">


                                <span>
                                    الكمية
                                </span>



                                <form action="{{ route('cart.decrease', $id) }}" method="POST">

                                    @csrf

                                    <button type="submit">
                                        -
                                    </button>

                                </form>




                                <strong>

                                    {{ $item['quantity'] }}

                                </strong>





                                <form action="{{ route('cart.increase', $id) }}" method="POST">

                                    @csrf

                                    <button type="submit">
                                        +
                                    </button>

                                </form>



                            </div>






                            <p class="cart-price">

                                السعر الجزئي:

                                @if (isset($item['old_price']) && $item['old_price'] > $item['price'])
                                    <span class="discount-price">

                                        ${{ $subtotal }}

                                    </span>
                                @else
                                    ${{ $subtotal }}
                                @endif


                            </p>




                        </div>






                        <form action="{{ route('cart.remove', $id) }}" method="POST">

                            @csrf

                            <button class="remove-btn">

                                حذف

                            </button>

                        </form>




                    </div>
                @endforeach



            </div>







            <div class="cart-summary">


                <h3>

                    السعر الكلي:

                    <span>

                        ${{ $total }}

                    </span>

                </h3>




                <a href="{{ route('cart.checkout') }}" class="checkout-btn">

                    الدفع

                </a>



            </div>
        @else
            <div class="empty-cart">


                <i class="bi bi-cart-x"></i>


                <h3>
                    سلتك فارغة
                </h3>


                <p>
                    لم تقومي بإضافة أي منتجات إلى السلة بعد.
                </p>


            </div>
        @endif


        <div class="cart-actions">

            <a href="{{ route('products.index') }}" class="btn continue-shopping-btn">

                متابعة التسوق

            </a>

        </div>
    </section>


@endsection
