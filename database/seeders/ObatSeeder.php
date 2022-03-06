<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Obat::create([
            'name' => 'Amlodipine 5mg',
            'satuan' => 'Strip',
            'harga' => '6000',
            'stok' => '10'
        ]);
    }
}
