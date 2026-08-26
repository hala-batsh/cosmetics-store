<?php $__env->startSection('content'); ?>
    
    <section class="hero">

        <div class="hero-content">

            <p class="hero-subtitle">جمال • أناقة • ثقة</p>

            <h1>
                اكتشفي<br>
                <span>جمالك</span>
            </h1>

            <p class="hero-description">
                مجموعتنا مختارة بعناية من منتجات التجميل لتضيف لمسة خاصة إلى روتينك اليومي، حيث نجمع لكِ أحدث المنتجات
                وأكثرها تميزًا لتمنحي بشرتك واطلالتك العناية التي تستحقها.
            </p>

            <a href="<?php echo e(route('categories')); ?>" class="hero-btn">
                اكتشفي مجموعتنا
                <i class="bi bi-arrow-left"></i>
            </a>

        </div>

        <div class="hero-image">
            <img src="<?php echo e(asset('images/hero.jpg')); ?>" alt="منتجات التجميل">
        </div>

    </section>


    
    <section class="home-section products-section">

        <div class="section-heading">

            <h2>الأكثر مبيعًا</h2>

            <span>
                منتجات أحبها عملاؤنا واختاروها لإطلالاتهم اليومية
            </span>

        </div>


        <div class="products-grid">

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="beauty-product-card">

                    <div class="product-image">

                        <?php if($product->photos->first()): ?>
                            <img src="<?php echo e(asset('storage/' . $product->photos->first()->image_pathe)); ?>"
                                alt="<?php echo e($product->name); ?>">
                        <?php else: ?>
                            <div class="no-image">
                                <i class="bi bi-image"></i>
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
                            عرض المنتج
                        </a>

                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </section>

    
    

    <section class="offers-banner">

        <div class="offers-image">

            <img src="<?php echo e(asset('images/offer.jpg')); ?>" alt="عروض التجميل">

        </div>


        <div class="offers-content">

            <p class="offers-subtitle">
                العروض والتخفيضات
            </p>


            <h2>
                دلّلي نفسك مع خصومات مميزة تصل إلى
                <span>
                    35%
                </span>


            </h2>


            <p class="offers-description">

                اكتشفي افخم منتجات التجميل بأسعار لا تفوّت.
                و استفيدي من عروضنا الحصرية لتحصلي على إطلالة
                متكاملة بلمسة من الأناقة والجمال.

            </p>



            <a href="<?php echo e(route('offers')); ?>" class="hero-btn">

                أحدث العروض

                <i class="bi bi-arrow-left"></i>

            </a>


        </div>


    </section>

    
    <section class="home-section why-section">

        <div class="section-heading">

            <h2>لماذا نحن؟</h2>

            <span> لأنكِ تستحقين الأفضل وتجربة استثنائية فريدة</span>

        </div>


        <div class="features-grid">

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="bi bi-gem"></i>
                </div>

                <h3>منتجات مختارة</h3>

                <p>
                    نختار لكِ منتجات مميزة تناسب روتينك
                    وإطلالتك اليومية.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    <i class="bi bi-truck"></i>
                </div>

                <h3>توصيل سريع</h3>

                <p>
                    استلمي طلبك بسهولة وبأسرع وقت ممكن.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    <i class="bi bi-shield-check"></i>
                </div>

                <h3>تسوّق آمن</h3>

                <p>
                    نحافظ على أمان معلوماتك وتجربة تسوقك.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    <i class="bi bi-heart"></i>
                </div>

                <h3>اختيارات تناسبك</h3>

                <p>
                    اكتشفي منتجات تساعدك على إبراز جمالك
                    بطريقتك الخاصة.
                </p>

            </div>

        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/home.blade.php ENDPATH**/ ?>