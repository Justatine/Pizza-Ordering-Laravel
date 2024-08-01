<?php

use App\Models\Orderdetails;
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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id('detailId');
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('productId');
            $table->integer('quantity');
            $table->double('price');
            $table->enum('size', ['Small', 'Medium', 'Large']);
            $table->double('subtotal');
            $table->timestamps();

            $table->foreign('orderId')
            ->references('orderId')
            ->on('orders')
            ->onDelete('cascade');

            $table->foreign('productId')
            ->references('productId')
            ->on('products')
            ->onDelete('cascade');
        });

        Orderdetails::insert([
            [
                'orderId' => 1,
                'productId' => 1,
                'price' => 100,
                'quantity' => 2,
                'size' => 'Small',
                'subtotal' => 200,
                'created_at' => now(),
                'updated_at' => now()   
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
