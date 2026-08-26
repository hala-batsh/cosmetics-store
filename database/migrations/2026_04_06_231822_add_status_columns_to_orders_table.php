<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table){

            if (!Schema::hasColumn('orders', 'payment_status')) {
                $table->enum('payment_status', ['pending', 'completed'])
                    ->default('pending')
                    ->after('id');
            }

            if (!Schema::hasColumn('orders', 'order_status')) {
                $table->enum('order_status', ['pending', 'processing', 'shipped', 'completed'])
                    ->default('pending')
                    ->after('payment_status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_status', 'order_status']);
        });
    }
};
