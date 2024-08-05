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
                'name' => 'Italian Pizza',
                'image' => 'pizza-1.jpg',
                'price' => 100,
                'created_at' => now(),
                'updated_at' => now()   
            ],
            [
                'name' => 'Greek Pizza',
                'image' => 'pizza-2.jpg',
                'price' => 125,
                'created_at' => now(),
                'updated_at' => now()            
            ],
            [
                'name' => 'Caucasian Pizza',
                'image' => 'pizza-3.jpg',
                'price' => 150,
                'created_at' => now(),
                'updated_at' => now()   
            ],
            [
                'name' => 'American Pizza',
                'image' => 'pizza-4.jpg',
                'price' => 125,
                'created_at' => now(),
                'updated_at' => now()            
            ],
            [
                'name' => 'Tomatoe Pie',
                'price' => 125,
                'image' => 'pizza-5.jpg',
                'created_at' => now(),
                'updated_at' => now()            
            ],
            [
                'name' => 'Margherita',
                'image' => 'pizza-6.jpg',
                'price' => 125,
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
