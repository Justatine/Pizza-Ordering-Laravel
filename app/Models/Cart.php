<?php

namespace App\Models;

use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['cartId', 'productId', 'userId', 'quantity', 'size', 'dateordered', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsTo(Products::class);
    }
}
