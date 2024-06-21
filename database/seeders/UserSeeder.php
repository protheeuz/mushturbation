<?php

namespace Database\Seeders;

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
            'name' => 'Admin',
            'email' => 'admin@bashturbation.com',
            'password' => bcrypt('bashturbation'), // ganti untuk mengganti 'password' dengan kata sandi yang kuat
        ]);
    }
}
