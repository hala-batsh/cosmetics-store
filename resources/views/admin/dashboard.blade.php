@extends('admin.layout')

@section('content')
    <div class="page-box">
        <h2 class="mb-4">
            <i class="bi bi-speedometer2"></i> Dashboard
        </h2>

        <div class="dashboard-cards">

            <a href="/admin/categories" class="dashboard-card text-decoration-non">
                <i class="bi bi-tags"></i>
                <h5>Categories</h5>
                <p>Manage categories</p>
            </a>

            <a href="/admin/products" class="dashboard-card text-decoration-none">
                <i class="bi bi-box"></i>
                <h5>Products</h5>
                <p>Manage products</p>
            </a>

            <a href="/admin/orders" class="dashboard-card text-decoration-none">
                <i class="bi bi-receipt"></i>
                <h5>Orders</h5>
                <p>View orders</p>
            </a>

            <a href="/admin/statistics" class="dashboard-card text-decoration-none">
                <i class="bi bi-graph-up"></i>
                <h5>Statistics</h5>
                <p>Overview</p>
            </a>

        </div>
    </div>
@endsection
