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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->foreignId('product_ID');
            $table->foreignId('size_ID');
            $table->foreign('product_ID')->references('product_ID')->on('products');
            $table->foreign('size_ID')->references('size_ID')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sizes');
    }
};
