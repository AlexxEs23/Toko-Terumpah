<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
   

    // Admin Produk Methods
    public function dataProduct(){
        $products = Produk::orderBy('created_at', 'desc')->get();
        return view('admin.produk.data_product', compact('products'));
    }

    public function addProduct(){
        return view('admin.produk.add_product');
    }
    
    function addProductProcess(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Produk::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);                 
        return redirect()->route('admin.dataProduct')->with('success', 'Product added successfully.');

    }

    public function updateProduct($id){
        $product = Produk::findOrFail($id);
        return view('admin.produk.update_product', compact('product'));
    }

        function updateProductProcess(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Produk::findOrFail($id);
        
        $imagePath = $product->image; // Keep existing image by default
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.dataProduct')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id){
        $product = Produk::findOrFail($id);
        
        // Delete image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        
        return redirect()->route('admin.dataProduct')->with('success', 'Product deleted successfully.');
    }

    
}
