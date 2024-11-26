<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view_product()
    {
        $products = Product::with('category')->get();
        return view('admin.products', compact('products'));
    }

    public function create(){
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('admin.create_product', compact('products','categories'));
    }


    public function addProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images' => 'nullable|image',
            'category_id' => 'exists:categories,id',
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('images')) {
            $product->images = $request->file('images')->store('products');
        }

        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product added successfully!');
    }

    public function shop(){
        $products = Product::all();
        return view('home.allProduct',compact('products'));
    }






}
