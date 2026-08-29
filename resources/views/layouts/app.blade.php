<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hala Cosmetics Store</title>

    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">


    {{-- Favicon --}}
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>

    {{-- ================= NAVBAR ================= --}}
    <header class="site-header">

        <nav class="navbar">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="navbar-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="Cosmetics Store">
            </a>
            <button class="menu-toggle" type="button">
                <i class="bi bi-list"></i>
            </button>

            {{-- Navigation Links --}}
            <ul class="nav-links">

                <li>
                    <a href="{{ route('home') }}">
                        الرئيسية
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.index') }}">
                        المنتجات
                    </a>
                </li>

                <li>
                    <a href="{{ route('categories') }}">
                        التصنيفات
                    </a>
                </li>

                <li>
                    <a href="{{ route('offers') }}">
                        عروضنا
                    </a>
                </li>

                @auth
                    <li>
                        <a href="{{ route('orders.index') }}">
                            طلباتي
                        </a>
                    </li>
                @endauth

            </ul>


            {{-- Navbar Actions --}}
            <div class="navbar-actions">

                {{-- Cart --}}
                <a href="{{ route('cart.index') }}" class="nav-icon" title="سلة التسوق">

                    <i class="bi bi-handbag-fill"></i>

                </a>


                {{-- Authentication --}}
                @auth

                    {{-- Account --}}
                    {{-- ملاحظة رح طوره باضافة بروفايل للمستخدم --}}


                    {{-- Logout --}}
                    <form action="{{ url('/logout') }}" method="POST" class="logout-form">

                        @csrf

                        <button type="submit" class="logout-link">

                            <i class="bi bi-box-arrow-left"></i>

                            تسجيل الخروج

                        </button>

                    </form>
                @else
                    {{-- Login --}}
                    <a href="{{ route('login') }}" class="login-link">

                        تسجيل الدخول

                    </a>


                    {{-- Register --}}
                    <a href="{{ url('/register') }}" class="register-link">

                        إنشاء حساب

                    </a>

                @endauth

            </div>

        </nav>

    </header>


    {{-- ================= MAIN CONTENT ================= --}}

    <main class="content">

        @yield('content')

    </main>


    {{-- ================= FOOTER ================= --}}

    <footer class="footer">

        <div class="footer-container">


            {{-- About --}}
            <div class="footer-column footer-about">

                <img src="{{ asset('images/footer.jpg') }}" alt="Cosmetics Store" class="footer-logo">

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


            {{-- Quick Links --}}
            <div class="footer-column">

                <h3>روابط سريعة</h3>

                <ul>

                    <li>
                        <a href="{{ route('home') }}">
                            الرئيسية
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}">
                            المنتجات
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categories') }}">
                            التصنيفات
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cart.index') }}">
                            سلة التسوق
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Customer Service --}}
            <div class="footer-column">

                <h3>خدمة العملاء</h3>

                <ul>

                    @auth

                        <li>
                            <a href="{{ route('orders.index') }}">
                                <i class="bi bi-bag-check"></i>
                                طلباتي
                            </a>
                        </li>


                    @endauth

                    <li>
                        <a href="{{ route('contact') }}">
                            تواصل معنا
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('faq') }}">الأسئلة الشائعة</a>
                    </li>

                </ul>

            </div>


            {{-- Contact --}}
            <div class="footer-column">

                <h3>تواصلي معنا</h3>

                <div class="footer-contact">

                    <p>
                        <i class="bi bi-telephone"></i>
                        951675437 963+
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


        {{-- Copyright --}}
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
