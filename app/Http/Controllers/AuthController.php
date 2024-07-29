<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function show(){
        return view('auth.signin');
    }

    public function login(){
        Validator::make(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt(request()->only(['email', 'password']))) {
            $user = auth()->user();
            switch ($user->role) {
                case 'Admin':
                    return redirect('/admin/index');
                case 'Incharge':
                    return redirect('/incharge/index');
                case 'Customer':
                    return redirect('/student/index');
                default:
                    return redirect('/');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
    }    

    public function logout(){
        auth()->logout();

        return redirect('/signin');
    }
}
