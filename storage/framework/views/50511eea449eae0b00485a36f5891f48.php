<?php $__env->startSection('content'); ?>


<section class="page-hero">

    <div class="page-hero-content">

        <h1>
            اكتشفي
            <span><?php echo e($category->name); ?></span>
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
                <?php echo e($category->name); ?>

                <span>Collection</span>
            </h2>

        </div>


        <div class="products-count">

            <?php echo e($category->products->count()); ?> Products

        </div>


    </div>




    <div class="products-page-grid">


        <?php $__empty_1 = true; $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


        <div class="beauty-product-card">


            <div class="product-image">


                <?php if($product->photos->first()): ?>

                    <img
                    src="<?php echo e(asset('storage/' . $product->photos->first()->image_pathe)); ?>"
                    alt="<?php echo e($product->name); ?>">


                <?php else: ?>


                    <div class="no-image">

                        <i class="bi bi-image"></i>

                        <span>No Image</span>

                    </div>


                <?php endif; ?>


            </div>




            <div class="product-info">


                <h3>
                    <?php echo e($product->name); ?>

                </h3>




                <p class="product-price">
                    $<?php echo e($product->price); ?>

                </p>




                <?php if($product->status == 0): ?>


                    <div class="product-status not-available">

                        Product Not Available

                    </div>



                <?php elseif($product->stock <= 0): ?>


                    <div class="product-status out-stock">

                        Out of Stock

                    </div>



                <?php else: ?>


                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">

                        <?php echo csrf_field(); ?>

                        <button type="submit" class="product-btn">

                            <i class="bi bi-cart-plus-fill"></i>

                            Add to Cart

                        </button>


                    </form>


                <?php endif; ?>



            </div>



        </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>



        <div class="empty-products">

            <i class="bi bi-box-seam"></i>

            <h3>No Products Found</h3>

            <p>
                لا يوجد منتجات ضمن هذا التصنيف حالياً.
            </p>

        </div>



        <?php endif; ?>



    </div>



</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/categories/products.blade.php ENDPATH**/ ?>