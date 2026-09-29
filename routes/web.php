<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

// 1. Route Halaman Utama (Diberi nama 'frontend')
Route::get('/', function () {
    return view('frontend');
})->name('frontend');

// 2. Route Halaman Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// 3. Route Halaman Admin Dashboard
Route::get('/admin', function () {
    $products = Product::with('category')->latest()->take(10)->get();

    $totalProducts = Product::count();
    $totalCategories = Category::count();
    $totalSuppliers = Supplier::count();

    return view('admin', compact('products', 'totalProducts', 'totalCategories', 'totalSuppliers'));
})->name('admin');
