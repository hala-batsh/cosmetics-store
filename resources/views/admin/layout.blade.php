<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>

    <div class="admin-wrapper">


        <aside class="sidebar">
            <h4>Admin Panel</h4>

            <a href="/admin"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="/admin/categories"><i class="bi bi-tags"></i> Categories</a>
            <a href="/admin/products"><i class="bi bi-box"></i> Products</a>
            <a href="/admin/orders"><i class="bi bi-receipt"></i> Orders</a>
        </aside>

      
        <main class="content">
            @yield('content')
        </main>

    </div>

</body>

</html>
