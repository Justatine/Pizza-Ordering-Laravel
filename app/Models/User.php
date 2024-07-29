<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Orderdetails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'image',
    ];

    protected $guarded = [
        'id',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }
    public function getImage() {
        if ($this->image) {
          return url('profile/'. $this->image);
        }
        return url('profile/default.png');
    }

    public function carts() {
        return $this->hasMany(Cart::class)->latest();
    }

    public function orders() {
        return $this->hasMany(Orders::class)->latest();
    }

    public function orderdetails() {
        return $this->hasMany(Orderdetails::class)->latest();
    }
}
