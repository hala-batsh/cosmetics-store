
@extends('admin.layout')

@section('content')
    <div class="page-box">

        <h2 class="mb-4">
            <i class="bi bi-bar-chart-line-fill"></i> Statistics
        </h2>

        <div class="table-responsive">

            <table class="table table-bordered text-center align-middle shadow-sm">

                <thead>
                    <tr style="background-color:#5a2a82; color:white;">
                        <th>Item</th>
                        <th>Value</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>
                            <i class="bi bi-box-seam text-primary me-2"></i>
                            Total Products
                        </td>
                        <td class="fw-bold">{{ $products }}</td>
                    </tr>

                    <tr>
                        <td>
                            <i class="bi bi-cart-check text-success me-2"></i>
                            Sold Products
                        </td>
                        <td class="fw-bold">{{ $soldProducts }}</td>
                    </tr>

                    <tr>
                        <td>
                            <i class="bi bi-truck text-success me-2"></i>
                            Delivered Orders
                        </td>
                        <td class="fw-bold">{{ $deliveredOrders }}</td>
                    </tr>

                    <tr>
                        <td>
                            <i class="bi bi-send text-primary me-2"></i>
                            Shipped Orders
                        </td>
                        <td class="fw-bold">{{ $shippedOrders }}</td>
                    </tr>

                    <tr>
                        <td>
                            <i class="bi bi-hourglass-split text-warning me-2"></i>
                            Pending Orders
                        </td>
                        <td class="fw-bold">{{ $pendingOrders }}</td>
                    </tr>

                    <tr>
                        <td>
                            <i class="bi bi-cash-coin text-danger me-2"></i>
                            Revenue
                        </td>
                        <td class="fw-bold">${{ $revenue }}</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>
@endsection
