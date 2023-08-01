<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        \App\Models\kelas::create([
            'nama_kelas'=>'Kelas '. Str::random(3)
        ]);
        \App\Models\kelas::create([
            'nama_kelas'=>'Kelas '.Str::random(3)
        ]);
    }
}
