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
        Schema::create('shoping_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_categories_id');
            $table->foreign('sub_categories_id')
                  ->references('id')
                  ->on('sub_categories')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                   ->references('id')
                   ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoping_cart');
    }
};
