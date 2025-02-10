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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('categories_id');
            $table->string('product_title');
            $table->string('product_description',500);
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('market_id');
            $table->string('price');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('sizes_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('color_id')->references('id')->on('sub_categories_color');
            $table->foreign('sizes_id')->references('id')->on('sub_categories_sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
