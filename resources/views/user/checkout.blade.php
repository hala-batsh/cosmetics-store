@extends('layouts.app')

@section('content')

    <h1 class="page-title">
        <i class="bi bi-credit-card-fill"></i> Checkout
    </h1>

    @php
        $cart = session('cart', []);
        $subtotal = 0;
    @endphp

    @if (count($cart) > 0)
        <form action="{{ route('order.store') }}" method="POST">
            @csrf

            <div class="checkout-container">


                <div class="checkout-box">
                    <h3><i class="bi bi-person-fill"></i> Customer Information</h3>

                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="text" name="phone" placeholder="Phone Number" required>
                </div>


                <div class="checkout-box">
                    <h3><i class="bi bi-geo-alt-fill"></i> Shipping Address</h3>

                    <input type="text" name="city" placeholder="City" required>
                    <input type="text" name="street" placeholder="Street Address" required>
                    <input type="text" name="postal_code" placeholder="Postal Code" required>
                </div>


                <div class="checkout-box">
                    <h3><i class="bi bi-truck"></i> Shipping Company</h3>

                    <select id="shipping_company" name="delivery_company_id" required>

                        <option value="">Choose the shipping company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" data-price="{{ $company->{'delivery_price'} }}">
                                {{ $company->{'name_company'} }}
                                (${{ number_format($company->{'delivery_price'}, 2) }})
                            </option>
                        @endforeach
                    </select>


                    <input type="hidden" id="delivery_price" name="delivery_price" value="0">
                </div>


                <div class="checkout-box summary-box">
                    <h3><i class="bi bi-list-check"></i> Order Summary</h3>

                    @foreach ($cart as $productId => $item)
                        @php
                            $itemSubtotal = $item['price'] * $item['quantity'];
                            $subtotal += $itemSubtotal;
                        @endphp

                        <div class="summary-item">
                            <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                            <span>${{ number_format($itemSubtotal, 2) }}</span>
                        </div>

                        <input type="hidden" name="products[{{ $productId }}][product_id]" value="{{ $productId }}">
                        <input type="hidden" name="products[{{ $productId }}][quantity]"
                            value="{{ $item['quantity'] }}">
                    @endforeach

                    <hr>

                    <p>
                        <strong>Subtotal:</strong>
                        <span id="subtotal">${{ number_format($subtotal, 2) }}</span>
                    </p>

                    <p>
                        <strong>Delivery:</strong>
                        <span id="delivery">$0.00</span>
                    </p>

                    <p>
                        <strong>Total:</strong>
                        <span id="total">${{ number_format($subtotal, 2) }}</span>
                    </p>

                    <button type="submit" class="btn place-order-btn">
                        <i class="bi bi-bag-check-fill"></i> Place Order
                    </button>
                </div>

            </div>
        </form>
    @else
        <p>Your cart is empty. <a href="{{ '/' }}" class="btn"> <i class="bi bi-arrow-left-circle"></i>
            </a></p>
    @endif



    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const shippingSelect = document.getElementById("shipping_company");
            const deliveryInput = document.getElementById("delivery_price");
            const deliveryText = document.getElementById("delivery");
            const subtotalText = document.getElementById("subtotal");
            const totalText = document.getElementById("total");

            function calculateTotal() {
                const selected = shippingSelect.options[shippingSelect.selectedIndex];
                let delivery = selected.dataset.price ?
                    parseFloat(selected.dataset.price) :
                    0;

                let subtotal = parseFloat(subtotalText.textContent.replace('$', ''));

                let total = subtotal + delivery;

                // تحديث القيم
                deliveryInput.value = delivery.toFixed(2);
                deliveryText.textContent = "$" + delivery.toFixed(2);
                totalText.textContent = "$" + total.toFixed(2);
            }

            shippingSelect.addEventListener("change", calculateTotal);

            // تشغيل عند تحميل الصفحة
            calculateTotal();
        });
    </script>

@endsection
