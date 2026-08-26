@extends('layouts.app')

@section('content')


    {{-- =====================================================
     SUCCESS MESSAGE
===================================================== --}}

    @if (session('success'))
        <div class="product-success-message">

            <i class="bi bi-check-circle-fill"></i>

            {{ session('success') }}

        </div>
    @endif





    {{-- =====================================================
     PRODUCT DETAILS
===================================================== --}}


    <section class="product-details-page">


        <div class="product-details-wrapper">





            {{-- =====================================================
     PRODUCT IMAGE
===================================================== --}}


            <div class="product-details-image">


                @if ($product->photos->first())
                    <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}" alt="{{ $product->name }}">
                @else
                    <div class="product-no-image">


                        <i class="bi bi-image"></i>


                        <span>
                            لا توجد صورة للمنتج
                        </span>


                    </div>
                @endif


            </div>







            {{-- =====================================================
     PRODUCT INFORMATION
===================================================== --}}


            <div class="product-details-info">



                <p class="product-details-label">

                    HALA BEAUTY COSMETICS

                </p>





                <h1>

                    {{ $product->name }}

                </h1>








                {{-- =====================================================
     PRODUCT RATING
===================================================== --}}



                @php

                    $reviewsCount = $product->reviews->count();

                    $averageRating = $reviewsCount ? round($product->reviews->avg('rating'), 1) : 0;

                @endphp





                <div class="rating-summary">



                    <div class="rating-stars">


                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= round($averageRating))
                                <i class="bi bi-star-fill"></i>
                            @else
                                <i class="bi bi-star"></i>
                            @endif
                        @endfor


                    </div>





                    @if ($reviewsCount > 0)
                        <span class="rating-number">

                            {{ $averageRating }}

                        </span>


                        <span class="rating-count">

                            ({{ $reviewsCount }} تقييم)

                        </span>
                    @else
                        <span class="rating-count">

                            لا توجد تقييمات بعد

                        </span>
                    @endif



                </div>







                {{-- =====================================================
     PRICE WITH DISCOUNT
===================================================== --}}



                <div class="product-details-price">



                    @if ($product->discount_price)
                        <span class="old-product-price">

                            ${{ number_format($product->price, 2) }}

                        </span>



                        <span class="discount-product-price">

                            ${{ number_format($product->discount_price, 2) }}

                        </span>
                    @else
                        <span class="normal-product-price">

                            ${{ number_format($product->price, 2) }}

                        </span>
                    @endif



                </div>








                {{-- =====================================================
     DESCRIPTION
===================================================== --}}



                <div class="product-details-description">


                    <h3>

                        وصف المنتج

                    </h3>



                    <p>

                        {{ $product->description ?? 'لا يتوفر وصف لهذا المنتج حاليًا.' }}

                    </p>


                </div>







                {{-- =====================================================
     PRODUCT STATUS
===================================================== --}}



                @if ($product->status == 0)
                    <div class="product-status not-available">


                        <i class="bi bi-x-circle"></i>


                        المنتج غير متوفر حاليًا


                    </div>
                @elseif($product->stock <= 0)
                    <div class="product-status out-stock">


                        <i class="bi bi-exclamation-circle"></i>


                        نفدت الكمية


                    </div>
                @else
                    <div class="product-stock">


                        <i class="bi bi-check-circle-fill"></i>


                        المنتج متوفر حاليًا


                    </div>






                    {{-- =====================================================
     ADD TO CART
===================================================== --}}



                    <form action="{{ route('cart.add', $product->id) }}" method="POST">


                        @csrf



                        <button type="submit" class="add-to-cart-btn">


                            <i class="bi bi-bag-plus"></i>


                            إضافة إلى السلة


                        </button>



                    </form>
                @endif





            </div>


        </div>
        {{-- =====================================================
     REVIEWS SECTION
===================================================== --}}


        <section class="product-reviews">



            <div class="reviews-header">


                <p>

                    CUSTOMER REVIEWS

                </p>



                <h2>

                    آراء عملائنا

                </h2>



                <span>

                    تجارب حقيقية من عملائنا

                </span>



            </div>







            {{-- =====================================================
     ADD REVIEW
===================================================== --}}



            @auth



                <div class="add-review-box">



                    <div class="add-review-heading">


                        <h3>

                            شاركينا تجربتك

                        </h3>



                        <span>

                            رأيك يساعدنا على تقديم الأفضل دائمًا

                        </span>


                    </div>






                    <form action="{{ route('review.store', $product->id) }}" method="POST" class="review-form">


                        @csrf





                        <label>

                            تقييمك للمنتج

                        </label>







                        <div class="stars-input">



                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button" class="rating-star" data-value="{{ $i }}">


                                    <i class="bi bi-star"></i>


                                </button>
                            @endfor



                        </div>






                        <input type="hidden" name="rating" id="rating-input" required>







                        <textarea name="comment" placeholder="اكتبي رأيك حول تجربتك مع المنتج..." required></textarea>







                        <button type="submit" class="submit-review-btn">


                            <i class="bi bi-send"></i>


                            إرسال التقييم


                        </button>






                    </form>



                </div>
            @else
                <div class="login-review-message">



                    <i class="bi bi-person-circle"></i>



                    <p>

                        سجّلي الدخول حتى تتمكني من إضافة تقييمك.

                    </p>



                </div>




            @endauth







            {{-- =====================================================
     CUSTOMER REVIEWS
===================================================== --}}




            <div class="reviews-list">





                @if ($product->reviews->count())
                    @foreach ($product->reviews as $review)
                        <div class="review-card">






                            <div class="review-top">





                                <div class="review-user">





                                    <div class="review-user-icon">


                                        <i class="bi bi-person"></i>


                                    </div>







                                    <div>


                                        <h4>

                                            {{ $review->user->name ?? 'User' }}

                                        </h4>



                                        <span>

                                            عميل

                                        </span>



                                    </div>






                                </div>








                                <div class="review-stars">





                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <i class="bi bi-star-fill"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor





                                </div>





                            </div>








                            <p class="review-comment">


                                {{ $review->comment }}


                            </p>






                        </div>
                    @endforeach
                @else
                    <div class="no-reviews">



                        <i class="bi bi-chat-square-heart"></i>



                        <h3>

                            لا توجد تقييمات بعد

                        </h3>



                        <p>

                            كوني أول من يشارك تجربته مع هذا المنتج.

                        </p>



                    </div>
                @endif





            </div>






        </section>






    </section>







    {{-- =====================================================
     RATING SCRIPT
===================================================== --}}



    <script>
        const ratingStars = document.querySelectorAll('.rating-star');

        const ratingInput = document.getElementById('rating-input');



        ratingStars.forEach((star, index) => {



            star.addEventListener('click', function() {



                const value = this.dataset.value;



                ratingInput.value = value;





                ratingStars.forEach((item, itemIndex) => {



                    const icon = item.querySelector('i');



                    if (itemIndex <= index) {



                        icon.classList.remove('bi-star');

                        icon.classList.add('bi-star-fill');

                        item.classList.add('active');



                    } else {



                        icon.classList.remove('bi-star-fill');

                        icon.classList.add('bi-star');

                        item.classList.remove('active');



                    }



                });



            });



        });
    </script>



@endsection
