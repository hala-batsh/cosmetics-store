<?php $__env->startSection('content'); ?>
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




    

    <div class="products-grid offers-grid">


        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="beauty-product-card offer-card">


                <div class="product-image">


                    <?php if($product->photos->first()): ?>
                        <img src="<?php echo e(asset('storage/' . $product->photos->first()->image_pathe)); ?>"
                            alt="<?php echo e($product->name); ?>">
                    <?php else: ?>
                        <div class="no-image">

                            <i class="bi bi-image"></i>

                        </div>
                    <?php endif; ?>







                    <button class="wishlist-btn">

                        <i class="bi bi-heart"></i>

                    </button>


                </div>




                <div class="product-info">


                    <h3>
                        <?php echo e($product->name); ?>

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
                            $<?php echo e(number_format($product->price, 2)); ?>

                        </del>


                        <strong>

                            $<?php echo e(number_format($product->discount_price, 2)); ?>


                        </strong>


                    </div>




                    <a href="<?php echo e(route('products.show', $product->id)); ?>" class="product-btn">

                        تفاصيل المنتج

                    </a>



                </div>


            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/offers.blade.php ENDPATH**/ ?>