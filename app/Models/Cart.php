<?php

namespace App\Models;

use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['productId', 'userId', 'quantity', 'size'];
    protected $guarded = ['cartId'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsTo(Products::class);
    }
}
