<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function newUser(){
        return view('admin.users.new');
    }

    public function storeUser(){
        $data = request()->validate([
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'phone' => ['required', 'string', 'min:11', 'max:11'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            $data['image'] = $imageName;
        }

        // $data['password'] = bcrypt($data['password']);
        $data['password'] = Hash::make($data['password']);
        
        User::create($data);

        return redirect('/admin/users')->with('status', 'User added');
    }

    public function deleteUser(User $user){
        if ($user) {
            if ($user->image) {
                $imagePath = public_path('images/users/' . $user->image); 
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $user->delete();          
            return redirect('/admin/users')->with('status', 'User deleted');
        } else {
            return redirect('/admin/users')->with('status', 'User not found');
        }    
    }

    public function editUser($users){
        $users = User::find($users);
        return view('admin.users.update', [
            'users' => $users
        ]);
    }

    public function updateUser(Request $request, User $user){
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
            // $data['password'] = bcrypt($request->password);
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
    
        $user->update($data);
    
        return redirect('/admin/users')->with('status', 'User updated');
    }
    
}
