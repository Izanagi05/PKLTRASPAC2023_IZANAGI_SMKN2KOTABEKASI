<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Laravelia',
        //     'email' => 'laravelia@web.com',
        //     'password' => Hash::make('password')
        // ]);
        Pengguna::create([
            'nama' => 'akuu',
            'email' => 'akku@web.com',
            'password' => Hash::make('123')
        ]);
    }
}
