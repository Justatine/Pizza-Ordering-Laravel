<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                    return redirect('/admin');
                case 'Incharge':
                    return redirect('/incharge');
                case 'Customer':
                    return redirect('/');
                default:
                    return redirect('/');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
    }    

    public function register(){
        $data = request()->validate([
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        User::create($data);
    
        return redirect('/signup')->with('status', 'Registration successful');    
    }
    public function logout(){
        auth()->logout();
        return redirect('/signin');
        // return response()->json(['message' => 'Signing out...']);
    }
}
