<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'admin']);
        $kasir_role = Role::create(['name' => 'kasir']);
        $penjaga_toko_role = Role::create(['name' => 'penjaga_toko']);
        $user = User::create([
            'nama_user' => 'M. Fadil Martias',
            'username' => 'mfadil',
            'email' => 'fadil@ara.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('password'),
            'is_admin' => true,
            'no_hp' => '082152082404',
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'nama_user' => 'Indri Rahmi',
            'username' => 'rain',
            'email' => 'indri@ara.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('password'),
            'is_admin' => true,
            'no_hp' => '085282736397'
        ]);
        $user->assignRole('kasir');
    }
}
