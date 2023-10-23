<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Pengguna;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // // $this->call('UsersTableSeeder');
        // for ($i=1; $i <=5 ; $i++) {
        //     # code...
        //     Kelas::create([
        //         'nama_kelas'=>'Kelas '. $i.Str::random(3)
        //     ]);
        // }

        $kategorilist = [
            'Makanan',
            'Minuman',
            'Musik',
            'Anime',
            'Teknologi',
        ];
        foreach ($kategorilist as $ktgr) {
            DB::table('kategoris')->insert([
                'nama'=> $ktgr
            ]);

        }

        for ($i=1; $i <=10 ; $i++) {
            Pengguna::create([
                'nama'=>$faker->name(),
                'username'=>$faker->userName(),
                'password'=>'123',

            ]);
            }
        for ($i=0; $i <10000 ; $i++) {
            DB::table('transaksis')->insert([
                'penggunas_pengguna_id'=> random_int(1,10),
                'produks_produk_id'=> random_int(1,5),
                'keterangan'=> 'Berhasil melakukan transaksi',
            ]);
        }
        for ($i=0; $i <10 ; $i++) {
            DB::table('produks')->insert([
                // 'penggunas_pengguna_id'=> random_int(1,10),
                'kategoris_kategori_id'=> random_int(1,5),
                'nama'=> 'produk' . random_int(1,10),
                'stok'=>random_int(1,10) *1000,
            ]);
        }

    }
}
