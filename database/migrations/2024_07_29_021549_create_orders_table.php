<?php

use App\Models\Orders;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderId');
            $table->unsignedBigInteger('userId');
            $table->double('total');
            $table->enum('status', ['Pending', 'On queue', 'For delivery', 'Delivered'])->default('Pending');
            $table->timestamp('dateordered')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->foreign('userId')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        Orders::insert([
            [
                'userId' => 2,
                'total' => 200,
                'status' => 'Pending',
                'dateordered' => now(),
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
        Schema::dropIfExists('orders');
    }
};
