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
        Schema::create('sub_categories_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_categories_id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('sub_categories_id')
                ->references('id')
                ->on('sub_categories')
                ->onDelete('cascade');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
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
