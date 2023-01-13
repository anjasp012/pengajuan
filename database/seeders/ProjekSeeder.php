<?php

namespace Database\Seeders;

use App\Models\Projek;
use Illuminate\Database\Seeder;

class ProjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projek::create([
            'nama_projek' => 'PT Telaga Kahuripan',
            'email' => 'kahurian@gmail.com',
        ]);
    }
}
