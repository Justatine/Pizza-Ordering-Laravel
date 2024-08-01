<?php

namespace App\Models;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderdetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'detailId';
    protected $fillable = ['orderId', 'productId', 'quantity', 'price', 'size', 'subtotal'];
    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Orders::class, 'orderId', 'orderId');
    }
      
    public function product() {
        return $this->belongsTo(Products::class, 'productId', 'productId');
    }
}
