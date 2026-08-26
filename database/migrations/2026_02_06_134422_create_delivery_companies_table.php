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
            Schema::create('delivery_companies_table', function (Blueprint $table) {
                $table->id();
                $table->string('name_company');
                $table->string('phone');
                $table->decimal('delivery_price', 8, 2);
                $table->string('estimated_time');
                $table->string('status'); //حالة شركة الشحن يعني اذا كانت متاحة او لا

                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('delivery_companies_table');
        }
    };
