<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Siswa;
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

        // $this->call('UsersTableSeeder');
        for ($i=1; $i <=5 ; $i++) {
            # code...
            Kelas::create([
                'nama_kelas'=>'Kelas '. $i.Str::random(3)
            ]);
        }

        $pelajaranNames = [
            'Matematika',
            'Bahasa Inggris',
            'Fisika',
            'Kimia',
            'Biologi',
            'Sejarah',
            'Geografi',
            'Ekonomi',
            'Sosiologi',
            'Seni Budaya',
        ];
        foreach ($pelajaranNames as $pljrn) {
            DB::table('pelajaranminats')->insert([
                'nama_pelajaran'=> $pljrn
            ]);

        }



        for ($i=1; $i <=20 ; $i++) {
            Siswa::create([
                'nama'=>$faker->name,
                'nis'=>$faker->numberBetween(100000000, 999999999),
                'alamat'=>$faker->address,
                'lahir'=>'2023-07-27',
                'kelas_id'=>random_int(1, 5),

            ]);
        }
        for ($i=0; $i <4 ; $i++) {
            Guru::create([
                'nama'=>$faker->name,

            ]);
        }

        //ini pivot tabel
        for ($i=0; $i <20 ; $i++) {
            DB::table('pelajarangurus')->insert([
                'pelajaran_pelajaran_id'=> random_int(1,10),
                'gurus_guru_id'=> random_int(1,5)
            ]);
        }
        //iini pivot table
        for ($i=0; $i <20 ; $i++) {
            DB::table('pelajaranmurids')->insert([
                'pelajaran_pelajaran_id'=> random_int(1,10),
                'murids_murid_id'=> random_int(1,20)
            ]);
        }


        // for ($i=1; $i <=20 ; $i++) {
        //     DB::table('pelajaranminats')->insert([
        //         'nama' => $nama,
        //         'tanggal_lahir' => $tanggalLahir,
        //     ]);
        // }

    }
}
