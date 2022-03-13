<?php

namespace Database\Seeders;

use App\Models\PenjualanObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PenjualanObat::create([
            'no_penjualan' => 'PJ-5050',
            'obat_id' => '2',
            'qty' => '2',
            'penjualan_id' => '1',
            'satuan' => 'Botol',
            'harga' => '110000',

        ]);

        PenjualanObat::create([
            'no_penjualan' => 'PJ-5050',
            'obat_id' => '1',
            'qty' => '1',
            'penjualan_id' => '1',
            'satuan' => 'Strip',
            'harga' => '5000',

        ]);
    }
}
