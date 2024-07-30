<?php

use App\Models\Products;
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
            $table->id('productId');
            $table->string('name');
            $table->string('price');
            $table->string('image')->nullable()->default(null);
            $table->enum('status', ['Available', 'Not available'])->default("Not available");
            $table->timestamps();
        });

        Products::insert([
            [
                'name' => 'Hawaian Delight',
                'price' => 100,
                'created_at' => now(),
                'updated_at' => now()   
            ],
            [
                'name' => 'Bacon and Cheese',
                'price' => 125,
                'created_at' => now(),
                'updated_at' => now()            
            ],
            [
                'name' => 'Pepperoni',
                'price' => 150,
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
        Schema::dropIfExists('products');
    }
};
