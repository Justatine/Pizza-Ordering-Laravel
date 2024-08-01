<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function newProduct(){
        return view('admin.products.new');
    }

    public function storeProduct(){
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $data['image'] = $imageName;
        }

        Products::create($data);

        return redirect('/admin/products')->with('status', 'Product added');
    }

    public function deleteProduct(Products $product){
        if ($product) {
            if ($product->image) {
                $imagePath = public_path('images/products/' . $product->image);
                
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $product->delete();          
            return redirect('/admin/products')->with('status', 'Product deleted');
        } else {
            return redirect('/admin/products')->with('status', 'Product not found');
        }    
    }

    public function editProduct($products){
        $products = Products::find($products);

        return view('admin.products.update', [
            'products' => $products
        ]);
    }

    public function updateProduct(Request $request, Products $product){
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
                unlink(public_path('images/products/' . $product->image));
            }
    
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
    
            $data['image'] = $imageName;
        }
        
        $product->update($data);

        return redirect('/admin/products')->with('status', 'Product updated');
        // return redirect()->back()->with(['success' => 'Profile updated successfully.']);
    }
}
