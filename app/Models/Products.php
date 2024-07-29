<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $guarded = ['productId', 'name', 'price', 'image', 'status', 'created_at', 'updated_at'];
    
    public function carts() {
        return $this->hasMany(Cart::class)->latest();
    }
}
