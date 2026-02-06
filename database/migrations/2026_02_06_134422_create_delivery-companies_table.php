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
        Schema::create('delivery-companies_table', function (Blueprint $table) {
            $table->id();
            $table->string('name-company');
            $table->string('phone')->nullable();
            $table->decimal('delivery-price', 8, 2);
            $table->string('estimated-time')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
