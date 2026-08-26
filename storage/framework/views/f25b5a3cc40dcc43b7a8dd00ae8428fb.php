<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hala Cosmetics Store</title>

    
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/products.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/cart.css')); ?>">

    
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>

    
    <header class="site-header">

        <nav class="navbar">

            
            <a href="<?php echo e(route('home')); ?>" class="navbar-logo">
                <img src="<?php echo e(asset('images/logo.jpg')); ?>" alt="Cosmetics Store">
            </a>
            <button class="menu-toggle" type="button">
                <i class="bi bi-list"></i>
            </button>

            
            <ul class="nav-links">

                <li>
                    <a href="<?php echo e(route('home')); ?>">
                        الرئيسية
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('products.index')); ?>">
                        المنتجات
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('categories')); ?>">
                        التصنيفات
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('offers')); ?>">
                        عروضنا
                    </a>
                </li>

                <?php if(auth()->guard()->check()): ?>
                    <li>
                        <a href="<?php echo e(route('orders.index')); ?>">
                            طلباتي
                        </a>
                    </li>
                <?php endif; ?>

            </ul>


            
            <div class="navbar-actions">

                
                <a href="<?php echo e(route('cart.index')); ?>" class="nav-icon" title="سلة التسوق">

                    <i class="bi bi-bag"></i>

                </a>


                
                <?php if(auth()->guard()->check()): ?>

                    
                    <a href="<?php echo e(route('orders.index')); ?>" class="nav-user">

                        <i class="bi bi-person"></i>

                        <span>حسابي</span>

                    </a>


                    
                    <form action="<?php echo e(url('/logout')); ?>" method="POST" class="logout-form">

                        <?php echo csrf_field(); ?>

                        <button type="submit" class="logout-link">

                            <i class="bi bi-box-arrow-left"></i>

                            تسجيل الخروج

                        </button>

                    </form>
                <?php else: ?>
                    
                    <a href="<?php echo e(route('login')); ?>" class="login-link">

                        تسجيل الدخول

                    </a>


                    
                    <a href="<?php echo e(url('/register')); ?>" class="register-link">

                        إنشاء حساب

                    </a>

                <?php endif; ?>

            </div>

        </nav>

    </header>


    

    <main class="content">

        <?php echo $__env->yieldContent('content'); ?>

    </main>


    

    <footer class="footer">

        <div class="footer-container">


            
            <div class="footer-column footer-about">

                <img src="<?php echo e(asset('images/footer.jpg')); ?>" alt="Cosmetics Store" class="footer-logo">

                <p>
                    اكتشفي عالمًا من الجمال والأناقة،
                    واختاري منتجاتك المفضلة بعناية لتظهري
                    بأجمل إطلالة كل يوم.
                </p>


                <div class="social-links">

                    <a href="https://www.instagram.com/cosmetics_store1997" target="_blank" aria-label="Instagram">

                        <i class="bi bi-instagram"></i>

                    </a>

                    <a href="https://www.facebook.com/share/1HJwSkTzTs" target="_blank" aria-label="Facebook">

                        <i class="bi bi-facebook"></i>

                    </a>

                    <a href="#" aria-label="TikTok">

                        <i class="bi bi-tiktok"></i>

                    </a>

                </div>

            </div>


            
            <div class="footer-column">

                <h3>روابط سريعة</h3>

                <ul>

                    <li>
                        <a href="<?php echo e(route('home')); ?>">
                            الرئيسية
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('products.index')); ?>">
                            المنتجات
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('categories')); ?>">
                            التصنيفات
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('cart.index')); ?>">
                            سلة التسوق
                        </a>
                    </li>

                </ul>

            </div>


            
            <div class="footer-column">

                <h3>خدمة العملاء</h3>

                <ul>

                    <?php if(auth()->guard()->check()): ?>

                        <li>
                            <a href="<?php echo e(route('orders.index')); ?>">
                                طلباتي
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('addresses.index')); ?>">
                                عناويني
                            </a>
                        </li>

                    <?php endif; ?>

                    <li>
                        <a href="#">
                            تواصل معنا
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            الأسئلة الشائعة
                        </a>
                    </li>

                </ul>

            </div>


            
            <div class="footer-column">

                <h3>تواصلي معنا</h3>

                <div class="footer-contact">

                    <p>
                        <i class="bi bi-telephone"></i>
                        +963 951 675 437
                    </p>

                    <p>
                        <i class="bi bi-envelope"></i>
                        halabatesh@gmail.com
                    </p>

                    <p>
                        <i class="bi bi-geo-alt"></i>
                        حلب، سوريا
                    </p>

                </div>

            </div>

        </div>


        
        <div class="footer-bottom">

            <p>
                © 2026 Hala Cosmetics Store <br> صُمم بعناية ليقدم لكِ تجربة جمال استثنائية.
            </p>

        </div>

    </footer>
    <script>
        const menuToggle = document.querySelector(".menu-toggle");
        const navLinks = document.querySelector(".nav-links");

        menuToggle.addEventListener("click", () => {
            navLinks.classList.toggle("active");
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/layouts/app.blade.php ENDPATH**/ ?>