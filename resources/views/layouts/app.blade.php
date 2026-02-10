<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cosmetics Store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Cosmetics</div>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="/cart">Cart</a></li>
        </ul>
    </nav>

    <!-- Page Content -->
    <main class="content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2026 Cosmetics Store. All rights reserved.</p>
    </footer>

</body>

</html>
