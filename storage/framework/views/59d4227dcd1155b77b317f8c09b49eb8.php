<?php $__env->startSection('content'); ?>
    <section class="page-hero">

        <div class="page-hero-content">


            <h1>
                اكتشفي
                <span>عالم الجمال</span>
            </h1>

            <p class="page-description">
                اختيارات راقية صُممت لتمنحك كل ما تحتاجينه لإطلالة متكاملة
            </p>

        </div>

    </section>

    <section class="categories-page">

        <div class="categories-grid">

            <?php $__currentLoopData = $categories->where('status', 1)->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $images = [
                        'face.jpg',
                        'eyes.jpg',
                        'lips.jpg',
                        'nails.jpg',
                        'hair.jpg',
                        'body.jpg',
                        'fragrance.jpg',
                        'tools.jpg',
                    ];

                    $image = $images[$loop->index];
                ?>

                <div class="category-card">

                    

                    <div class="category-image">
                        <img src="<?php echo e(asset('images/categories/' . $image)); ?>" alt="<?php echo e($category->name); ?>">
                    </div>


                    

                    <div class="category-info">


                        <h2>
                            <?php echo e($category->name); ?>

                        </h2>

                        <p>
                            <?php echo e($category->description ?? 'اختيارات مختارة بعناية لتكمّل جمالك وتمنحك إطلالة أكثر أناقة.'); ?>

                        </p>

                        <a href="<?php echo e(route('category.products', $category->id)); ?>">

                            اكتشفي المجموعة

                            <i class="bi bi-arrow-left"></i>

                        </a>

                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/categories/index.blade.php ENDPATH**/ ?>