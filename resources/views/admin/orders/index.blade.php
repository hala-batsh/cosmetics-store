@extends('admin.layout')

@section('content')

    <div class="page-box orders-page">

        <div class="page-header">

            <div class="page-title">

                <div class="page-title-icon">
                    <i class="bi bi-receipt"></i>
                </div>

                <div>
                    <h2>الطلبات</h2>
                    <p>متابعة وإدارة طلبات العملاء</p>
                </div>

            </div>

        </div>


        <div class="orders-table-wrapper">

            <table class="orders-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>رقم الطلب</th>
                        <th>العميل</th>
                        <th>الإجمالي</th>
                        <th>الحالة</th>
                        <th>التاريخ</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse ($orders as $order)
                        <tr>

                            <td class="order-number">
                                {{ $loop->iteration }}
                            </td>


                            <td class="order-code">
                                #ORD-{{ $order->id }}
                            </td>


                            <td class="customer-name">
                                <i class="bi bi-person"></i>
                                {{ $order->user->name ?? 'زائر' }}
                            </td>


                            <td class="order-total">
                                ${{ $order->total_price }}
                            </td>


                            <td>

                                @if ($order->order_status == 'completed')
                                    <span class="order-status status-completed">
                                        <i class="bi bi-check-circle"></i>
                                        مكتمل
                                    </span>
                                @elseif(in_array($order->order_status, ['processing', 'shipped', 'delivered']))
                                    <span class="order-status status-progress">

                                        <i class="bi bi-clock"></i>

                                        @if ($order->order_status == 'processing')
                                            قيد المعالجة
                                        @elseif ($order->order_status == 'shipped')
                                            تم الشحن
                                        @elseif ($order->order_status == 'delivered')
                                            تم التوصيل
                                        @endif

                                    </span>
                                @else
                                    <span class="order-status status-other">
                                        <i class="bi bi-info-circle"></i>
                                        {{ ucfirst($order->order_status) }}
                                    </span>
                                @endif

                            </td>


                            <td class="order-date">
                                {{ $order->created_at->format('Y-m-d') }}
                            </td>


                            <td>

                                <div class="order-actions">

                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="view-order-btn">

                                        <i class="bi bi-eye"></i>
                                        عرض

                                    </a>


                                    @if ($order->order_status != 'completed')
                                        <form action="{{ url('/admin/orders/' . $order->id . '/update-status') }}"
                                            method="POST">

                                            @csrf

                                            <input type="hidden" name="order_status" value="completed">

                                        </form>
                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="empty-orders">

                                <i class="bi bi-receipt"></i>

                                <strong>لا توجد طلبات</strong>

                                <span>لم يتم تسجيل أي طلبات حتى الآن</span>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
