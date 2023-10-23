<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use Stripe\Plan;
use Stripe\FileUpload;

class JasaController extends Controller
{
    public function creaateview(){
        return view('beranda.cruddata.create');

    }

    public function creaatePLanJasa(Request $request){
        try {
            //code...
            \Stripe\Stripe::setApiKey(config('stripe.sk'));
            $amount = ($request->paket *100);
        $plan=    Plan::create([
                'amount'=> $amount,
                'currency' =>'usd',
                'interval'=>'month',
                'product' =>[
                    'name' =>$request->nama,
                    'metadata' => [
                        'description' => $request->deskripsi,
                        'image_url' => $request->foto
                    ]
                    ],
                ]);
                // 'items' => [
                //     [
                //         'quantity' => $request->kuantitas,
                //     ]
                // ]
            // dd($plan);
            Jasa::create([
                'stripe_jasa'=>$plan->id,
                'nama'=> $request->nama,
                'slug'=>str_replace(' ', '-', strtolower($request->nama)),
                'paket'=> substr($plan->amount,0,-2),
                'deskripsi'=>$request->deskripsi,
                'kuantitas'=>$request->kuantitas,
                'foto'=>$request->foto
            ]);
            return redirect('/beranda');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
