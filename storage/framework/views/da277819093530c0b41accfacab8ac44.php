<?php $__env->startSection('content'); ?>


    

    <?php if(session('success')): ?>
        <div class="product-success-message">

            <i class="bi bi-check-circle-fill"></i>

            <?php echo e(session('success')); ?>


        </div>
    <?php endif; ?>





    


    <section class="product-details-page">


        <div class="product-details-wrapper">





            


            <div class="product-details-image">


                <?php if($product->photos->first()): ?>
                    <img src="<?php echo e(asset('storage/' . $product->photos->first()->image_pathe)); ?>" alt="<?php echo e($product->name); ?>">
                <?php else: ?>
                    <div class="product-no-image">


                        <i class="bi bi-image"></i>


                        <span>
                            لا توجد صورة للمنتج
                        </span>


                    </div>
                <?php endif; ?>


            </div>







            


            <div class="product-details-info">



                <p class="product-details-label">

                    HALA BEAUTY COSMETICS

                </p>





                <h1>

                    <?php echo e($product->name); ?>


                </h1>








                



                <?php

                    $reviewsCount = $product->reviews->count();

                    $averageRating = $reviewsCount ? round($product->reviews->avg('rating'), 1) : 0;

                ?>





                <div class="rating-summary">



                    <div class="rating-stars">


                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if($i <= round($averageRating)): ?>
                                <i class="bi bi-star-fill"></i>
                            <?php else: ?>
                                <i class="bi bi-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>


                    </div>





                    <?php if($reviewsCount > 0): ?>
                        <span class="rating-number">

                            <?php echo e($averageRating); ?>


                        </span>


                        <span class="rating-count">

                            (<?php echo e($reviewsCount); ?> تقييم)

                        </span>
                    <?php else: ?>
                        <span class="rating-count">

                            لا توجد تقييمات بعد

                        </span>
                    <?php endif; ?>



                </div>







                



                <div class="product-details-price">



                    <?php if($product->discount_price): ?>
                        <span class="old-product-price">

                            $<?php echo e(number_format($product->price, 2)); ?>


                        </span>



                        <span class="discount-product-price">

                            $<?php echo e(number_format($product->discount_price, 2)); ?>


                        </span>
                    <?php else: ?>
                        <span class="normal-product-price">

                            $<?php echo e(number_format($product->price, 2)); ?>


                        </span>
                    <?php endif; ?>



                </div>








                



                <div class="product-details-description">


                    <h3>

                        وصف المنتج

                    </h3>



                    <p>

                        <?php echo e($product->description ?? 'لا يتوفر وصف لهذا المنتج حاليًا.'); ?>


                    </p>


                </div>







                



                <?php if($product->status == 0): ?>
                    <div class="product-status not-available">


                        <i class="bi bi-x-circle"></i>


                        المنتج غير متوفر حاليًا


                    </div>
                <?php elseif($product->stock <= 0): ?>
                    <div class="product-status out-stock">


                        <i class="bi bi-exclamation-circle"></i>


                        نفدت الكمية


                    </div>
                <?php else: ?>
                    <div class="product-stock">


                        <i class="bi bi-check-circle-fill"></i>


                        المنتج متوفر حاليًا


                    </div>






                    



                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">


                        <?php echo csrf_field(); ?>



                        <button type="submit" class="add-to-cart-btn">


                            <i class="bi bi-bag-plus"></i>


                            إضافة إلى السلة


                        </button>



                    </form>
                <?php endif; ?>





            </div>


        </div>
        


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







            



            <?php if(auth()->guard()->check()): ?>



                <div class="add-review-box">



                    <div class="add-review-heading">


                        <h3>

                            شاركينا تجربتك

                        </h3>



                        <span>

                            رأيك يساعدنا على تقديم الأفضل دائمًا

                        </span>


                    </div>






                    <form action="<?php echo e(route('review.store', $product->id)); ?>" method="POST" class="review-form">


                        <?php echo csrf_field(); ?>





                        <label>

                            تقييمك للمنتج

                        </label>







                        <div class="stars-input">



                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <button type="button" class="rating-star" data-value="<?php echo e($i); ?>">


                                    <i class="bi bi-star"></i>


                                </button>
                            <?php endfor; ?>



                        </div>






                        <input type="hidden" name="rating" id="rating-input" required>







                        <textarea name="comment" placeholder="اكتبي رأيك حول تجربتك مع المنتج..." required></textarea>







                        <button type="submit" class="submit-review-btn">


                            <i class="bi bi-send"></i>


                            إرسال التقييم


                        </button>






                    </form>



                </div>
            <?php else: ?>
                <div class="login-review-message">



                    <i class="bi bi-person-circle"></i>



                    <p>

                        سجّلي الدخول حتى تتمكني من إضافة تقييمك.

                    </p>



                </div>




            <?php endif; ?>







            




            <div class="reviews-list">





                <?php if($product->reviews->count()): ?>
                    <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="review-card">






                            <div class="review-top">





                                <div class="review-user">





                                    <div class="review-user-icon">


                                        <i class="bi bi-person"></i>


                                    </div>







                                    <div>


                                        <h4>

                                            <?php echo e($review->user->name ?? 'User'); ?>


                                        </h4>



                                        <span>

                                            عميل

                                        </span>



                                    </div>






                                </div>








                                <div class="review-stars">





                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= $review->rating): ?>
                                            <i class="bi bi-star-fill"></i>
                                        <?php else: ?>
                                            <i class="bi bi-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>





                                </div>





                            </div>








                            <p class="review-comment">


                                <?php echo e($review->comment); ?>



                            </p>






                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="no-reviews">



                        <i class="bi bi-chat-square-heart"></i>



                        <h3>

                            لا توجد تقييمات بعد

                        </h3>



                        <p>

                            كوني أول من يشارك تجربته مع هذا المنتج.

                        </p>



                    </div>
                <?php endif; ?>





            </div>






        </section>






    </section>







    



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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/product-details.blade.php ENDPATH**/ ?>