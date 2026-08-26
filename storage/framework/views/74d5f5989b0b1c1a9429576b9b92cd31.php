<?php $__env->startSection('content'); ?>

    <h1 class="page-title">
        <i class="bi bi-credit-card-fill"></i> Checkout
    </h1>

    <?php
        $cart = session('cart', []);
        $subtotal = 0;
    ?>

    <?php if(count($cart) > 0): ?>
        <form action="<?php echo e(route('order.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

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
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($company->id); ?>" data-price="<?php echo e($company->{'delivery_price'}); ?>">
                                <?php echo e($company->{'name_company'}); ?>

                                ($<?php echo e(number_format($company->{'delivery_price'}, 2)); ?>)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                    <input type="hidden" id="delivery_price" name="delivery_price" value="0">
                </div>


                <div class="checkout-box summary-box">
                    <h3><i class="bi bi-list-check"></i> Order Summary</h3>

                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $itemSubtotal = $item['price'] * $item['quantity'];
                            $subtotal += $itemSubtotal;
                        ?>

                        <div class="summary-item">
                            <span><?php echo e($item['name']); ?> × <?php echo e($item['quantity']); ?></span>
                            <span>$<?php echo e(number_format($itemSubtotal, 2)); ?></span>
                        </div>

                        <input type="hidden" name="products[<?php echo e($productId); ?>][product_id]" value="<?php echo e($productId); ?>">
                        <input type="hidden" name="products[<?php echo e($productId); ?>][quantity]"
                            value="<?php echo e($item['quantity']); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <hr>

                    <p>
                        <strong>Subtotal:</strong>
                        <span id="subtotal">$<?php echo e(number_format($subtotal, 2)); ?></span>
                    </p>

                    <p>
                        <strong>Delivery:</strong>
                        <span id="delivery">$0.00</span>
                    </p>

                    <p>
                        <strong>Total:</strong>
                        <span id="total">$<?php echo e(number_format($subtotal, 2)); ?></span>
                    </p>

                    <button type="submit" class="btn place-order-btn">
                        <i class="bi bi-bag-check-fill"></i> Place Order
                    </button>
                </div>

            </div>
        </form>
    <?php else: ?>
        <p>Your cart is empty. <a href="<?php echo e('/'); ?>" class="btn"> <i class="bi bi-arrow-left-circle"></i>
            </a></p>
    <?php endif; ?>



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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cosmetics-store\resources\views/user/checkout.blade.php ENDPATH**/ ?>