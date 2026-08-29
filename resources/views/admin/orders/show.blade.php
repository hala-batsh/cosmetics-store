@extends('admin.layout')

@section('content')
    <div class="page-box order-details-page">

        <!-- عنوان الصفحة -->
        <div class="page-header">

            <div class="page-title">

                <div class="page-title-icon">
                    <i class="bi bi-receipt"></i>
                </div>

                <div>
                    <h2>تفاصيل الطلب</h2>
                    <p>عرض معلومات الطلب وتحديث حالته</p>
                </div>

            </div>

        </div>


        <!-- معلومات الطلب -->
        <div class="details-card">

            <div class="details-card-header">
                <i class="bi bi-info-circle"></i>
                <h5>معلومات الطلب</h5>
            </div>

            <div class="order-info-grid">

                <div class="order-info-item">
                    <span>رقم الطلب</span>
                    <strong>#ORD-{{ $order->id }}</strong>
                </div>

                <div class="order-info-item">
                    <span>العميل</span>
                    <strong>
                        <i class="bi bi-person"></i>
                        {{ $order->user->name ?? 'زائر' }}
                    </strong>
                </div>

                <div class="order-info-item">
                    <span>الإجمالي</span>
                    <strong class="order-price">
                        ${{ $order->total_price }}
                    </strong>
                </div>

                <div class="order-info-item">
                    <span>تاريخ الطلب</span>
                    <strong>
                        {{ $order->created_at->format('Y-m-d') }}
                    </strong>
                </div>

            </div>

        </div>


        <!-- الحالة الحالية -->
        <div class="details-card">

            <div class="details-card-header">
                <i class="bi bi-activity"></i>
                <h5>الحالة الحالية</h5>
            </div>


            <div class="current-status-grid">

                <div class="current-status-item">

                    <span>حالة الدفع</span>

                    @if ($order->payment_status == 'completed')
                        <span class="details-status status-completed">
                            <i class="bi bi-check-circle"></i>
                            مكتمل
                        </span>
                    @else
                        <span class="details-status status-pending">
                            <i class="bi bi-clock"></i>
                            قيد الانتظار
                        </span>
                    @endif

                </div>


                <div class="current-status-item">

                    <span>حالة الطلب</span>

                    @if ($order->order_status == 'completed')
                        <span class="details-status status-completed">
                            <i class="bi bi-check-circle"></i>
                            مكتمل
                        </span>
                    @elseif ($order->order_status == 'delivered')
                        <span class="details-status status-delivered">
                            <i class="bi bi-truck"></i>
                            تم التوصيل
                        </span>
                    @elseif ($order->order_status == 'shipped')
                        <span class="details-status status-shipped">
                            <i class="bi bi-box-seam"></i>
                            تم الشحن
                        </span>
                    @elseif ($order->order_status == 'processing')
                        <span class="details-status status-processing">
                            <i class="bi bi-arrow-repeat"></i>
                            قيد المعالجة
                        </span>
                    @else
                        <span class="details-status status-pending">
                            <i class="bi bi-clock"></i>
                            قيد الانتظار
                        </span>
                    @endif

                </div>

            </div>

        </div>


        <!-- تحديث الحالة -->
        <div class="details-card">

            <div class="details-card-header">
                <i class="bi bi-pencil-square"></i>
                <h5>تحديث الحالة</h5>
            </div>


            <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">

                @csrf


                <div class="status-form-grid">

                    <!-- حالة الدفع -->
                    <div class="form-group">

                        <label for="payment_status">
                            حالة الدفع
                        </label>

                        <select name="payment_status" id="payment_status" class="form-input">

                            <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>
                                قيد الانتظار
                            </option>

                            <option value="completed" {{ $order->payment_status == 'completed' ? 'selected' : '' }}>
                                مكتمل
                            </option>

                        </select>

                    </div>


                    <!-- حالة الطلب -->
                    <div class="form-group">

                        <label for="order_status">
                            حالة الطلب
                        </label>

                        <select name="order_status" id="order_status" class="form-input">

                            <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>
                                قيد الانتظار
                            </option>

                            <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>
                                قيد المعالجة
                            </option>

                            <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>
                                تم الشحن
                            </option>

                            <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>
                                تم التوصيل
                            </option>

                            <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>
                                مكتمل
                            </option>

                        </select>

                    </div>

                </div>


                <div class="status-form-actions">

                    <button type="submit" class="save-btn">
                        <i class="bi bi-check-circle"></i>
                        حفظ تحديث الحالة
                    </button>

                    <a href="{{ route('admin.orders.index') }}" class="back-btn">
                        <i class="bi bi-arrow-right"></i>
                        العودة إلى الطلبات
                    </a>

                </div>





        </div>
    @endsection
