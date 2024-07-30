<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
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

    public function newProduct(){
        return view('admin.products.new');
    }

    public function storeProduct(){
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['required', 'string']
        ]);

        Products::create($data);

        return redirect('/admin/products')->with('status', 'Product added');
    }
}
