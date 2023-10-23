<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jasa;

class PembayaranController extends Controller
{
    public function beranda()
    {
        return view('beranda.beranda', [
            'jasas'=>Jasa::get()
        ]);


    }
    public function bayar(Request $request){
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $namaJasa=$request->nama;
        $nolnya="00";
        $paketJasa="$request->paket$nolnya";
        $sesi= \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            "name" =>$namaJasa,
                        ],
                        'unit_amount'=> $paketJasa,
                    ],
                    'quantity' => 1
                ]
                ],
            'mode' => 'payment',
            // 'success_url' => route('beranda.bayar'),
            // 'cancel_url' => route('beranda.beranda')
            'success_url' => route('suksess'),
            'cancel_url' => route('berandaku')
        ]);
        return redirect()->away($sesi->url);
    }
    public function show($slug)
    {
        $jasa = Jasa::where('slug', $slug)->first();

        if (!$jasa) {
            // Lakukan sesuatu jika jasa tidak ditemukan, misalnya redirect ke halaman 404.
            abort(404);
        }

        return view('beranda.detail', [
            "judul" => "Single Post",
            "aktif" => 'posts',
            "detailjasa" => $jasa
        ]);
    }

    public function detail()
    {
        return view('beranda.detail');
    }
    public function viewbayar()
    {
        return view('beranda.bayar');
    }
    public function sukses()
    {
        return view('beranda.sukses');
    }


}
