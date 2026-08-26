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
        Schema::table('delivery_companies_table', function (Blueprint $table) {
            $table->string('name_company');
            $table->string('phone');
            $table->decimal('delivery_price', 8, 2);
            $table->string('estimated_time');
            $table->string('status');
        });
    }

    public function down(): void
    {
        Schema::table('delivery_companies_table', function (Blueprint $table) {
            $table->dropColumn([
                'name_company',
                'phone',
                'delivery_price',
                'estimated_time',
                'status'
            ]);
        });
    }
};
