@extends('admin.layout')

@section('content')
    <div class="page-box">

        <div class="page-header">
            <h2>
                <i class="bi bi-receipt"></i> Orders
            </h2>
        </div>

        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Order No</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>#ORD-{{ $order->id }}</td>

                        <td>{{ $order->user->name ?? 'Guest' }}</td>

                        <td>${{ $order->total_price }}</td>

                        <!-- 🔹 Status -->
                        <td>
                            @if ($order->order_status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif(in_array($order->order_status, ['processing', 'shipped', 'delivered']))
                                <span class="badge bg-warning text-dark">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            @endif
                        </td>

                        <td>{{ $order->created_at->format('Y-m-d') }}</td>

                        <!-- 🔹 Actions -->
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                View
                            </a>

                            @if ($order->order_status != 'completed')
                                <form action="{{ url('/admin/orders/' . $order->id . '/update-status') }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf

                                    <input type="hidden" name="order_status" value="completed">

                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
