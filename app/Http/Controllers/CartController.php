<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function gotoCart(){
        return view('pages.cart');
    }
}
