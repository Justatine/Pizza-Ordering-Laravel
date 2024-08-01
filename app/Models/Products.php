<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $primaryKey = 'productId';
    protected $fillable = ['name', 'price', 'status', 'image'];
    protected $guarded = [];
    
    public function carts() {
        return $this->hasMany(Cart::class)->latest();
    }
}
