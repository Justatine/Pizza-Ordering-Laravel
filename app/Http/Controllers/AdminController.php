<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __invoke(){
        return view('admin.index', [
            'user' => auth()->user()]
        );
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
}
