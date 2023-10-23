<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Jasa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Passwordnya 123',
            'email' => 'passwordnya123@example.com',
            'password' => Hash::make('123'),
        ]);
        $data=[
            ['nama'=>'Basic Quality',
            'slug'=>'basic-quality',
            'stripe_jasa'=>'price_1O398xFqOaUYu4yyXp4rsa1u',
            'paket'=>1,
            'deskripsi'=>'ini paket basic'],

            ['nama'=>'Best Quality',
            'slug'=>'best-quality',
            'stripe_jasa'=>'price_1O397HFqOaUYu4yy6b1bDJo2',
            'paket'=>60,
            'deskripsi'=>'ini paket Best Quality'],

            ['nama'=>'High Quality',
            'slug'=>'high-quality',
            'stripe_jasa'=>'price_1O396MFqOaUYu4yy2576UD7P',
            'paket'=>75,
            'deskripsi'=>'ini paket High Quality'],

            ['nama'=>'Super Premium Quality',
            'slug'=>'super-premium-quality',
            'stripe_jasa'=>'price_1O3950FqOaUYu4yy9qt94OpB',
            'paket'=>80,
            'deskripsi'=>'ini paket Premium Quality']
        ];
        foreach ($data as $key => $dt) {
           Jasa::create($dt);
        }

    }
}
