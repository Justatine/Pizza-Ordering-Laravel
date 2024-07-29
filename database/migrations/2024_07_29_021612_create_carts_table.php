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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cardId');
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('userId');
            $table->integer('quantity');
            $table->enum('size', ['Small', 'Medium', 'Large']);
            $table->timestamp('dateordered')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->foreign('productId')
            ->references('productId')
            ->on('products')
            ->onDelete('cascade');

            $table->foreign('userId')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
