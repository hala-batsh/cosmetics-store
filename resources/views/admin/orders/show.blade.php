@extends('admin.layout')

@section('content')
    <div class="page-box">

        <div class="page-header">
            <h2>
                <i class="bi bi-receipt"></i> Order Details
            </h2>
        </div>


        <div class="card shadow-sm mt-4">
            <div class="card-body">

                <h5 class="mb-3">Order Information</h5>

                <p><strong>Order No:</strong> #ORD-{{ $order->id }}</p>
                <p><strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                <p><strong>Total:</strong> ${{ $order->total_price }}</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>

            </div>
        </div>


        <div class="card shadow-sm mt-4">
            <div class="card-body">

                <h5 class="mb-3">Current Status</h5>

                <p>
                    <strong>Payment:</strong>
                    <span class="badge bg-secondary">
                        {{ ucfirst($order->payment_status) }}
                    </span>
                </p>

                <p>
                    <strong>Order:</strong>
                    <span class="badge bg-secondary">
                        {{ ucfirst($order->order_status) }}
                    </span>
                </p>

            </div>
        </div>


        <div class="card shadow-sm mt-4">
            <div class="card-body">

                <h5 class="mb-3">Update Status</h5>

                <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">

                    @csrf

                    <div class="row">

                        <!-- Payment Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Payment Status</label>

                            <select name="payment_status" class="form-select">
                                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="completed" {{ $order->payment_status == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                            </select>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order Status</label>

                            <select name="order_status" class="form-select">
                                <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>
                                    Processing
                                </option>

                                <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>
                                    Shipped
                                </option>

                                <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>
                                    Delivered
                                </option>

                                <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update Status
                    </button>

                </form>

            </div>
        </div>




    </div>
@endsection
