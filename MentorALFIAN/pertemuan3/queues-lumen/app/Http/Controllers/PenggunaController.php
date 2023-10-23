<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\JobDataku;
use App\Models\Pengguna;
use App\Models\Transaksi;
use App\Models\Kategori;

class PenggunaController extends Controller
{
    public function Jobkuu(){
        // $job = new JobDataku();
        // $job->handle();
        // $tes='tess';
        // app()->handle();
        // $dataku=Post::all();
        // $dataku='[[';
        dispatch(new JobDataku());
            return response()->json([
                'pesan'=>'sedang diproses',
        ]);
        // $dataku =Pengguna::get();
        // foreach ($dataku as $key => $dt) {
        //     $dataku[$key]['transaksi']=$dt->Transaksi;
        //     foreach ($dt->Transaksi as $key => $d) {
        //         $dt->Transaksi[$key]['produk']=$d->Produk;
        //     }
        // }
        // return response()->json([
        //     'data'=>'berasil',
        //     'datapost'=>$dataku,
        // ]);
    }
}
