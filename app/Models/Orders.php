<?php

namespace App\Models;

use App\Models\User;
use App\Models\Orderdetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $guarded = ['orderId', 'userId', 'total', 'status', 'dateordered', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
      public function orderDetails() {
        return $this->hasMany(Orderdetails::class);
    }
}
