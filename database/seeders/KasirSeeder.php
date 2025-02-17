<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example: Insert a sale record into kasir table
        DB::table('kasir')->insert([
            'produk_id' => 1,  // Assuming a product with id 1 exists in 'produks' table
            'jumlah_terjual' => 5,
            'total_harga' => 500.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
