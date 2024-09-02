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
        Schema::table('purchase_details', function (Blueprint $table) {
            $table->foreign('purchase_id')
                 ->references('id')
                 ->on('purchases')
                 ->onUpdate('restrict')
                 ->onDelete('restrict');

            $table->foreign('product_id')
                 ->references('id')
                 ->on('products')
                 ->onUpdate('restrict')
                 ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_details', function (Blueprint $table) {
            $table->dropForeign('purchase_details_purchase_id_foreign');
            $table->dropForeign('purchase_details_product_id_foreign');
        });
    }
};
