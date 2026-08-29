@extends('admin.layout')

@section('content')
    <div class="page-box statistics-page">

        <!-- عنوان الصفحة -->
        <div class="statistics-header">

            <div class="page-title">

                <div class="page-title-icon statistics-icon">
                    <i class="bi bi-bar-chart-line-fill"></i>
                </div>

                <div>
                    <h2>الإحصائيات</h2>
                    <p>ملخص شامل لأداء متجر التجميل</p>
                </div>

            </div>

        </div>


        <!-- =========================
             الإحصائيات الرئيسية
        ========================== -->

        <div class="statistics-grid">


            <!-- المنتجات -->
            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div class="stat-content">

                    <span>إجمالي المنتجات</span>

                    <strong>
                        {{ $products }}
                    </strong>

                    <small>
                        منتج في المتجر
                    </small>

                </div>

            </div>


            <!-- المنتجات المباعة -->
            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-cart-check"></i>
                </div>

                <div class="stat-content">

                    <span>المنتجات المباعة</span>

                    <strong>
                        {{ $soldProducts }}
                    </strong>

                    <small>
                        قطعة مباعة
                    </small>

                </div>

            </div>


            <!-- الطلبات الموصلة -->
            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-truck"></i>
                </div>

                <div class="stat-content">

                    <span>الطلبات الموصلة</span>

                    <strong>
                        {{ $deliveredOrders }}
                    </strong>

                    <small>
                        طلب تم توصيله
                    </small>

                </div>

            </div>


            <!-- الطلبات المشحونة -->
            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-send"></i>
                </div>

                <div class="stat-content">

                    <span>الطلبات المشحونة</span>

                    <strong>
                        {{ $shippedOrders }}
                    </strong>

                    <small>
                        طلب تم شحنه
                    </small>

                </div>

            </div>


            <!-- الطلبات المعلقة -->
            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-hourglass-split"></i>
                </div>

                <div class="stat-content">

                    <span>الطلبات المعلقة</span>

                    <strong>
                        {{ $pendingOrders }}
                    </strong>

                    <small>
                        بانتظار المعالجة
                    </small>

                </div>

            </div>


            <!-- الإيرادات -->
            <div class="stat-card revenue-card">

                <div class="stat-icon">
                    <i class="bi bi-cash-coin"></i>
                </div>

                <div class="stat-content">

                    <span>إجمالي الإيرادات</span>

                    <strong>
                        ${{ number_format($revenue, 2) }}
                    </strong>

                    <small>
                        من الطلبات المكتملة
                    </small>

                </div>

            </div>

        </div>


        <!-- =========================
             حالات الطلبات
        ========================== -->

        <div class="statistics-section">

            <div class="section-heading">

                <div>
                    <h3>حالات الطلبات</h3>
                    <p>نظرة سريعة على حالة جميع الطلبات</p>
                </div>

                <i class="bi bi-clipboard-check"></i>

            </div>


            <div class="order-status-grid">


                <div class="order-status-card">

                    <div class="status-card-icon pending">
                        <i class="bi bi-hourglass-split"></i>
                    </div>

                    <div>
                        <span>قيد الانتظار</span>
                        <strong>{{ $pendingOrders }}</strong>
                    </div>

                </div>


                <div class="order-status-card">

                    <div class="status-card-icon processing">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>

                    <div>
                        <span>قيد المعالجة</span>
                        <strong>{{ $processingOrders }}</strong>
                    </div>

                </div>


                <div class="order-status-card">

                    <div class="status-card-icon shipped">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div>
                        <span>تم الشحن</span>
                        <strong>{{ $shippedOrders }}</strong>
                    </div>

                </div>


                <div class="order-status-card">

                    <div class="status-card-icon delivered">
                        <i class="bi bi-truck"></i>
                    </div>

                    <div>
                        <span>تم التوصيل</span>
                        <strong>{{ $deliveredOrders }}</strong>
                    </div>

                </div>


                <div class="order-status-card">

                    <div class="status-card-icon completed">
                        <i class="bi bi-check-circle"></i>
                    </div>

                    <div>
                        <span>مكتمل</span>
                        <strong>{{ $completedOrders }}</strong>
                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             المبيعات الشهرية
        ========================== -->

        <div class="statistics-section sales-section">

            <div class="section-heading">

                <div>
                    <h3>المبيعات الشهرية</h3>
                    <p>إجمالي المبيعات خلال أشهر {{ now()->year }}</p>
                </div>

                <i class="bi bi-graph-up-arrow"></i>

            </div>


            <div class="sales-chart-container">

                <canvas id="salesChart"></canvas>

            </div>

        </div>


        <!-- =========================
             ملخص أداء المتجر
        ========================== -->

        <div class="statistics-section performance-section">

            <div class="section-heading">

                <div>
                    <h3>أداء المتجر</h3>
                    <p>ملخص سريع لأهم أرقام المتجر</p>
                </div>

                <i class="bi bi-stars"></i>

            </div>


            <div class="performance-grid">


                <div class="performance-card">

                    <div class="performance-icon">
                        <i class="bi bi-receipt"></i>
                    </div>

                    <div>
                        <span>إجمالي الطلبات</span>
                        <strong>{{ $totalOrders }}</strong>
                    </div>

                </div>


                <div class="performance-card">

                    <div class="performance-icon">
                        <i class="bi bi-currency-dollar"></i>
                    </div>

                    <div>
                        <span>إجمالي الإيرادات</span>
                        <strong>${{ number_format($revenue, 2) }}</strong>
                    </div>

                </div>


                <div class="performance-card">

                    <div class="performance-icon">
                        <i class="bi bi-calculator"></i>
                    </div>

                    <div>
                        <span>متوسط قيمة الطلب</span>
                        <strong>${{ number_format($averageOrder, 2) }}</strong>
                    </div>

                </div>


            </div>

        </div>

    </div>


    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const salesLabels = @json($salesLabels);
        const salesValues = @json($salesValues);

        const salesChart = document.getElementById('salesChart');

        new Chart(salesChart, {

            type: 'line',

            data: {

                labels: salesLabels,

                datasets: [{
                    label: 'المبيعات',
                    data: salesValues,

                    borderColor: '#a65373',

                    backgroundColor: 'rgba(166, 83, 115, 0.10)',

                    borderWidth: 3,

                    tension: 0.4,

                    fill: true,

                    pointRadius: 5,

                    pointHoverRadius: 7
                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {
                        beginAtZero: true,

                        ticks: {
                            font: {
                                family: 'Cairo'
                            }
                        }
                    },

                    x: {
                        ticks: {
                            font: {
                                family: 'Cairo'
                            }
                        }
                    }

                }

            }

        });
    </script>
@endsection
