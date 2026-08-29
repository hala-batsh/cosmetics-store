<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>لوحة التحكم | متجر التجميل</title>

    <!-- Bootstrap Icons فقط -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>

    <div class="admin-wrapper">

        <!-- Sidebar -->
        <aside class="admin-sidebar">

            <div class="sidebar-logo">
                <i class="bi bi-stars"></i>
                <span>متجر التجميل</span>
            </div>

            <nav class="sidebar-menu">

                <a href="/admin" class="sidebar-link">
                    <i class="bi bi-speedometer2"></i>
                    <span>لوحة التحكم</span>
                </a>

                <a href="/admin/categories" class="sidebar-link">
                    <i class="bi bi-tags"></i>
                    <span>الأقسام</span>
                </a>

                <a href="/admin/products" class="sidebar-link">
                    <i class="bi bi-box-seam"></i>
                    <span>المنتجات</span>
                </a>

                <a href="/admin/orders" class="sidebar-link">
                    <i class="bi bi-receipt"></i>
                    <span>الطلبات</span>
                </a>

                <a href="/admin/statistics" class="sidebar-link">
                    <i class="bi bi-bar-chart-line"></i>
                    <span>الإحصائيات</span>
                </a>

            </nav>

        </aside>


        <!-- Main Content -->
        <main class="admin-main">


            <!-- Page Content -->
            <section class="admin-content">

                @yield('content')

            </section>

        </main>

    </div>

</body>

</html>
