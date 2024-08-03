<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __invoke(){
        $productCount = Products::count();
        $usersCount = User::count();
        $ordersCount = Orders::count();

        return view('admin.index', [
            'user' => auth()->user(),
            'products_count' => $productCount,
            'users_count' => $usersCount,
            'orders_count' => $ordersCount
        ]);
    }
    public function products(){
        $user = Auth::user();
        $products = Products::orderByDesc('created_at')->get();

        return view('admin.products.products', [
            'user' => $user,
            'products' => $products
        ]);
    }
    public function users(){
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->orderByDesc('created_at')->get();

        return view('admin.users.users', [
            'user' => $user,
            'users' => $users
        ]);
    }
    public function orders(){
        $user = Auth::user();
        $orders = Orders::with(['orderdetails.product', 'user'])->get();
    
        return view('admin.orders.orders', [
            'user' => $user,
            'orders' => $orders
        ]);
    }
}
