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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_ID');
            $table->string('product_Name');
            $table->string('product_Description');
            $table->string('product_Sizes');
            $table->integer('quantity_in_Stock');
            $table->decimal('Price', 10, 2);
            $table->integer('Discount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
