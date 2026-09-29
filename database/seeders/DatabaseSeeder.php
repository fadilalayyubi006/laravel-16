<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder Kategori & Supplier terlebih dahulu
        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
        ]);

        // 2. Buat 50 data dummy produk secara otomatis via Factory
        Product::factory(50)->create();
    }
}
