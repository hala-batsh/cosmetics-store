<?php $__env->startSection('content'); ?>


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


        <?php

            $cart = session('cart', []);

            if (!is_array($cart)) {
                $cart = [];
            }

            $total = 0;

        ?>





        <?php if(count($cart) > 0): ?>
            <div class="cart-items">



                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php

                        $product = \App\Models\Product::find($id);

                        $subtotal = $item['price'] * $item['quantity'];

                        $total += $subtotal;

                    ?>





                    <div class="cart-card">



                        <div class="cart-image">


                            <?php if($product && $product->photos->first()): ?>
                                <img src="<?php echo e(asset('storage/' . $product->photos->first()->image_pathe)); ?>"
                                    alt="<?php echo e($item['name']); ?>">
                            <?php else: ?>
                                <img src="https://placehold.co/300x300" alt="<?php echo e($item['name']); ?>">
                            <?php endif; ?>


                        </div>





                        <div class="cart-info">


                            <h3>
                                <?php echo e($item['name']); ?>

                            </h3>




                            <p class="cart-price">


                                <?php if(isset($item['old_price']) && $item['old_price'] > $item['price']): ?>
                                    <span class="old-price">

                                        $<?php echo e($item['old_price']); ?>


                                    </span>


                                    <span class="discount-price">

                                        $<?php echo e($item['price']); ?>


                                    </span>
                                <?php else: ?>
                                    <span>

                                        $<?php echo e($item['price']); ?>


                                    </span>
                                <?php endif; ?>


                            </p>





                            <div class="quantity-box">


                                <span>
                                    الكمية
                                </span>



                                <form action="<?php echo e(route('cart.decrease', $id)); ?>" method="POST">

                                    <?php echo csrf_field(); ?>

                                    <button type="submit">
                                        -
                                    </button>

                                </form>




                                <strong>

                                    <?php echo e($item['quantity']); ?>


                                </strong>





                                <form action="<?php echo e(route('cart.increase', $id)); ?>" method="POST">

                                    <?php echo csrf_field(); ?>

                                    <button type="submit">
                                        +
                                    </button>

                                </form>



                            </div>






                            <p class="cart-price">

                                السعر الجزئي:

                                <?php if(isset($item['old_price']) && $item['old_price'] > $item['price']): ?>
                                    <span class="discount-price">

                                        $<?php echo e($subtotal); ?>


                                    </span>
                                <?php else: ?>
                                    $<?php echo e($subtotal); ?>

                                <?php endif; ?>


                            </p>




                        </div>






                        <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">

                            <?php echo csrf_field(); ?>

                            <button class="remove-btn">

                                حذف

                            </button>

                        </form>




                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>







            <div class="cart-summary">


                <h3>

                    السعر الكلي:

                    <span>

                        $<?php echo e($total); ?>


                    </span>

                </h3>




                <a href="<?php echo e(route('cart.checkout')); ?>" class="checkout-btn">

                    الدفع

                </a>



            </div>
        <?php else: ?>
            <div class="empty-cart">


                <i class="bi bi-cart-x"></i>


                <h3>
                    سلتك فارغة
                </h3>


                <p>
                    لم تقومي بإضافة أي منتجات إلى السلة بعد.
                </p>


            </div>
        <?php endif; ?>


        <div class="cart-actions">

            <a href="<?php echo e(route('products.index')); ?>" class="btn continue-shopping-btn">

                متابعة التسوق

            </a>

        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/cart.blade.php ENDPATH**/ ?>