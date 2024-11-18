<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime;
class AdminController extends Controller
{
    public function view_category(){
        $category = Category::all();
        return view('admin.category',compact('category'));
    }

    public function add_category(Request $request) {
        $category_ = Category::where('category_name', $request->category)->first();

        if ($category_) {
            return redirect()->back()->with('error', "Category already exists!");
        } else {
            $category = new Category();
            $category->category_name = $request->category;
            $category->save();

            toastr()->addSuccess('Category added successfully!');
            return redirect()->back()->with('success', 'Category added successfully!');
        }
    }

}
