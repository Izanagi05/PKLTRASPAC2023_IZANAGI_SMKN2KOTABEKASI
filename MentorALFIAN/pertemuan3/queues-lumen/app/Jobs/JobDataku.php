<?php

namespace App\Jobs;
use App\Models\Post;
use App\Models\Pengguna;
use App\Models\Kategori;

class JobDataku extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dataku =Pengguna::get();
        // foreach ($dataku as $key => $dt) {
        //     $dataku[$key]['dt']=$dt->Posts();
        // }
      foreach ($dataku as $key => $dt) {
            $dataku[$key]['transaksi']=$dt->Transaksi;
            foreach ($dt->Transaksi as $key => $d) {
                $dt->Transaksi[$key]['produk']=$d->Produk;
            }
        }
        INFO('ini datanya');
        INFO('ini datanya', ['data'=>$dataku]);
    }
}
