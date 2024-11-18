<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


Route::get('/',[HomeController::class,'home'])->name('home.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->name('admin.index')->middleware(['auth','admin']);
Route::get('/view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);
Route::post('/add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);
Route::get('/view_product', [ProductController::class, 'view_product'])->name('admin.product')->middleware(['auth', 'admin']);
Route::get('/create', [ProductController::class, 'create'])->name('admin.create')->middleware(['auth', 'admin']);
Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('admin.addProduct')->middleware(['auth', 'admin']);


