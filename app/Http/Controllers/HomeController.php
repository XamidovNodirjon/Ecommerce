<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function home(){

        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('home.index',compact('products', 'categories'));
    }

}
