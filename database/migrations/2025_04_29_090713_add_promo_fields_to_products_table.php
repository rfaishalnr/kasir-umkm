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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('promo_price', 10, 2)->nullable()->after('price');

            $table->boolean('is_promo_active')->default(false)->after('promo_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Hapus kolom saat rollback
            $table->dropColumn('promo_price');
            $table->dropColumn('is_promo_active');
        });
    }
};