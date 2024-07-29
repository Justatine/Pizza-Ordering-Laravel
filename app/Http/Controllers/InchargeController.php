<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InchargeController extends Controller
{
    public function __invoke(){
        return view('incharge.index',[
            'user' => auth()->user()
        ]);
    }
}
