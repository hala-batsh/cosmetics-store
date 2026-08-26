<?php $__env->startSection('content'); ?>
    

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


    

    <section class="products-page">

        <div class="products-heading">

            <div>
                <p>NEWE COLLECTION</p>

                <h2>
                    مجموعة المنتجات التي وفرناها لكِ

                </h2>
            </div>

            <span class="products-count">
                <?php echo e($products->count()); ?> منتج
            </span>

        </div>


        

        <div class="products-page-grid">

            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="beauty-product-card">

                    

                    <div class="product-image">

                        <?php if($product->photos->first()): ?>
                            <img src="<?php echo e(asset('storage/' . $product->photos->first()->image_pathe)); ?>"
                                alt="<?php echo e($product->name); ?>">
                        <?php else: ?>
                            <div class="no-image">

                                <i class="bi bi-image"></i>

                                <span>لا توجد صورة</span>

                            </div>
                        <?php endif; ?>


                        

                        <button class="wishlist-btn" type="button">

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


                        

                        <p class="product-price">

                            $<?php echo e(number_format($product->price, 2)); ?>


                        </p>


                        

                        <a href="<?php echo e(route('products.show', $product->id)); ?>" class="product-btn">
                            تفاصيل المنتج

                            <i class="bi bi-arrow-left"></i>

                        </a>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="empty-products">

                    <i class="bi bi-bag-x"></i>

                    <h3>
                        لا توجد منتجات حاليًا
                    </h3>

                    <p>
                        سيتم إضافة المنتجات قريبًا.
                    </p>

                </div>
            <?php endif; ?>

        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/products.blade.php ENDPATH**/ ?>