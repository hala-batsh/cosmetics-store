<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('address_id')->constrained('addresses')->cascadeOnDelete();
            $table->foreignId('delivery_id')->constrained('delivery_companies');

            $table->string('payment_method_id'); //طريقة الدفع الي قررنا تكون كاش
            $table->string('payment_status'); // حالة الدفع يعني بعد التسليم لانو كاش
            $table->string('order_status'); // حالة الطلبية
            $table->boolean('processing')->default(0); //انو يكون الطلب قيد المعالجة

            $table->decimal('delivery_price', 8, 2);
            $table->decimal('subtotal', 8, 2); //اسعار المنتجات بس يعني بدون سعر التوصيل
            $table->decimal('total_price', 8, 2); // السعر كامل

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
