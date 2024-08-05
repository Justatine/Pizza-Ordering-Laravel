<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function gotoCart(){
        return view('pages.cart');
    }
    public function addToCart($product){
        $user = Auth::user();
        $data = request()->validate([
            'quantity' => ['required', 'numeric'],
            'size' => ['required', 'string']
        ]);

        $data['productId'] = $product;
        $data['userId'] = $user->id;

        $checkDuplicate = Cart::where('productId', $product)->where('userId', $user->id)->first();
        if ($checkDuplicate) {
            return redirect()->back()->withErrors(['cart' => 'Item already added to cart']);
        }

        Cart::create($data);

        return redirect()->back()->with('status', 'Added to cart');
    }
}
