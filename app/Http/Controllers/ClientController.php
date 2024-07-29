<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show(){
        return view('index');
    }

    public function menu(){
        return view('pages.menu');
    }
    public function services(){
        return view('pages.services');
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function signin(){
        return view('auth.signin');
    }
}
