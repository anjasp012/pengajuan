<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'id_tipe' => '1',
            'id_projek' => '1',
            'nama_produk' => 'Aluna Tirta Tipe 3 Luas 90 Meter',
            'harga' => 'Rp. 400.000.000',
        ]);
    }
}
