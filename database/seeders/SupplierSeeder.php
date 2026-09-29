<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::create([
            'name' => 'PT. Indofood Sukses Makmur',
            'phone' => '02157958822',
            'address' => 'Jakarta'
        ]);

        Supplier::create([
            'name' => 'PT. Unilever Indonesia Tbk',
            'phone' => '02180827000',
            'address' => 'Tangerang'
        ]);

        Supplier::create([
            'name' => 'PT. Mayora Indah Tbk',
            'phone' => '02180637000',
            'address' => 'Jakarta'
        ]);
    }
}
