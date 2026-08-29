@extends('admin.layout')

@section('content')
    <div class="dashboard-page">

        <div class="dashboard-header">
            <h2 class="dashboard-title">
                <i class="bi bi-speedometer2"></i>
                لوحة التحكم
            </h2>

            <p class="dashboard-subtitle">
                مرحباً بكِ في لوحة إدارة المتجر
            </p>
        </div>


        <div class="dashboard-cards">

            <!-- الأقسام -->
            <a href="/admin/categories" class="dashboard-card">

                <div class="dashboard-icon">
                    <i class="bi bi-tags"></i>
                </div>

                <h5>الأقسام</h5>

                <p>إدارة أقسام المنتجات</p>

                <span class="dashboard-arrow">
                    <i class="bi bi-arrow-left"></i>
                </span>

            </a>


            <!-- المنتجات -->
            <a href="/admin/products" class="dashboard-card">

                <div class="dashboard-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h5>المنتجات</h5>

                <p>إدارة منتجات المتجر</p>

                <span class="dashboard-arrow">
                    <i class="bi bi-arrow-left"></i>
                </span>

            </a>


            <!-- الطلبات -->
            <a href="/admin/orders" class="dashboard-card">

                <div class="dashboard-icon">
                    <i class="bi bi-receipt"></i>
                </div>

                <h5>الطلبات</h5>

                <p>متابعة وإدارة الطلبات</p>

                <span class="dashboard-arrow">
                    <i class="bi bi-arrow-left"></i>
                </span>

            </a>


            <!-- الإحصائيات -->
            <a href="/admin/statistics" class="dashboard-card">

                <div class="dashboard-icon">
                    <i class="bi bi-bar-chart-line"></i>
                </div>

                <h5>الإحصائيات</h5>

                <p>عرض إحصائيات المتجر</p>

                <span class="dashboard-arrow">
                    <i class="bi bi-arrow-left"></i>
                </span>

            </a>

        </div>

    </div>
@endsection
