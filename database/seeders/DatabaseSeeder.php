<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
USE Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            // ObatSeeder::class,
            // PenjualanSeeder::class,
            // PenjualanObatSeeder::class,

        ]);
    }
}
