<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Http\Requests\ProductRequest;

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

Route::get('/test-acara17', function () {
    // 1. Ambil data gabungan produk & kategori (Inner Join)
    $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.name as nama_produk', 'products.price', 'categories.name as nama_kategori')
        ->get();

    // 2. Hitung total stok produk (Agregat)
    $totalStok = DB::table('products')->sum('stock');

    return response()->json([
        'data_produk' => $products,
        'total_stok'  => $totalStok
    ]);
});

// UJI COBA ACARA 18: ELOQUENT CRUD
Route::get('/test-acara18', function () {
    // 1. Create (Tambah Data)
    $newProduct = Product::create([
        'category_id' => 1,
        'name'        => 'Produk Uji Eloquent',
        'sku'         => 'PRD-TEST-18',
        'price'       => 15000,
        'stock'       => 50
    ]);

    // 2. Read (Ambil Data)
    $product = Product::find($newProduct->id);

    // 3. Update (Ubah Data)
    $product->update(['price' => 25000]);

    // 4. Delete (Hapus Data)
    $product->delete();

    return response()->json([
        'status' => 'Sukses',
        'pesan'  => 'Operasi CRUD Eloquent berhasil dijalankan',
        'data'   => $product
    ]);
});

// UJI COBA ACARA 19: ADVANCED ELOQUENT
Route::get('/test-acara19', function () {
    $minPrice = 15000;

    // Conditional clause (when) untuk memfilter produk berdasarkan stok dan harga
    $products = Product::where('stock', '>', 0)
        ->when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })
        ->take(5)
        ->get();

    return response()->json([
        'status'     => 'Sukses Acara 19',
        'filter'     => 'Harga minimal ' . $minPrice,
        'total_data' => $products->count(),
        'data'       => $products
    ]);
});

// UJI COBA ACARA 20: FORM & VALIDATION
Route::get('/test-acara20', function () {
    return view('product-form');
});

Route::post('/test-acara20', function (ProductRequest $request) {
    return response()->json([
        'status' => 'Sukses Validasi',
        'data'   => $request->validated()
    ]);
});
