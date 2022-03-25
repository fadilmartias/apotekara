<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuans = [
            [
                'obat_id' => 1,
                'nama_satuan' => 'Strip'
            ],
            [
                'obat_id' => 1,
                'nama_satuan' => 'Pcs'
            ],
        ];

        Satuan::insert($satuans);
    }
}
