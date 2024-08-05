<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function show(){
        return view('index');
    }

    public function menu(){
        $user = Auth::user();
        if (Auth::check()) {
            $products = Products::orderByDesc('created_at')->get();

            return view('pages.menu', [
                'user' => $user,
                'products' => $products
            ]);        
        }
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
    public function signup(){
        return view('auth.signup');
    }

    public function profile(){
        $users = Auth::user();
        $veiwpath = '';
        switch ($users->role) {
            case 'Admin':
                $veiwpath = 'admin';
                break;
            case 'Incharge':
                $veiwpath = 'incharge';
                break;
            case 'Customer':
                $veiwpath = 'pages';
                break;
            default:
            abort(403, 'Unauthorized access');
        }
        return view($veiwpath.'.my-profile', [
            'users' => $users
        ]);
    }
    
    public function updateProfile(Request $request, User $user){
        $data = $request->validate([
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'phone' => ['required', 'string', 'min:11', 'max:11'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users,email,' . $user->id], 
            'password' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
    
        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path('images/users/' . $user->image))) {
                unlink(public_path('images/users/' . $user->image));
            }
    
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
    
            $data['image'] = $imageName;
        }
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
    
        $user->update($data);
    
        return redirect()->back()->with('status', 'Profile updated');
    }
    public function productDetail($products){
        $products = Products::find($products);

        return view('pages.product-detail', [
            'products' => $products
        ]);
    }
}
