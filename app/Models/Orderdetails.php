<?php

namespace App\Models;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderdetails extends Model
{
    use HasFactory;
    protected $guarded = ['detailId', 'orderId', 'productId', 'quantity', 'price', 'size', 'subtotal', 'created_at', 'updated_at'];

    public function orders() {
        return $this->belongsTo(Orders::class);
    }
      
      public function products() {
        return $this->belongsTo(Products::class);
    }
}
