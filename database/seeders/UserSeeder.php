<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_user' => 'M. Fadil Martias',
            'username' => 'mfadil',
            'email' => 'fadil@ara.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('password'),
            'is_admin' => true,
            'no_hp' => '082152082404',
        ]);

        User::create([
            'nama_user' => 'Indri Rahmi',
            'username' => 'rain',
            'email' => 'indri@ara.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('password'),
            'is_admin' => true,
            'no_hp' => '085282736397'
        ]);
    }
}
