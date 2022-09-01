<?php

namespace Database\Seeders;

use App\Models\Category\JenisHewan;
use Illuminate\Database\Seeder;

class JenisHewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisHewan::create([
            'nama_jenis_hewan' => 'Anjing',
        ]);

        JenisHewan::create([
            'nama_jenis_hewan' => 'Kucing',
        ]);
    }
}
