<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->enum('role', ['Admin', 'Incharge', 'Customer'])->default('Customer');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        User::insert([
            [
                'firstname' => 'John', 
                'lastname' => 'Doe',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('asd'),
                'phone' => '09055757460',
                'address' => 'Ozamiz City',
                'role' => 'Admin',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'firstname' => 'Mark', 
                'lastname' => 'Doe',
                'email' => 'incharge@gmail.com',
                'password' => Hash::make('asd'),
                'phone' => '09055757460',
                'address' => 'Ozamiz City',
                'role' => 'Incharge',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'firstname' => 'Justine', 
                'lastname' => 'Doe',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('asd'),
                'phone' => '09055757460',
                'address' => 'Ozamiz City',
                'role' => 'Customer',
                'image' => null,
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
