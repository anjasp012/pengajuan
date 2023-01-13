<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama_jabatan' => 'Administrator',
        ]);
        Jabatan::create([
            'nama_jabatan' => 'General Manager',
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Manager',
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Sales',
        ]);
    }
}
