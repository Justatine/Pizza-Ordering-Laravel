<?php

namespace App\Models;

use App\Models\User;
use App\Models\Orderdetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $primaryKey = 'orderId';
    protected $fillable = ['userId', 'total', 'status', 'dateordered'];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
    
    public function orderDetails() {
        return $this->hasMany(Orderdetails::class, 'orderId', 'orderId');
    }
}
