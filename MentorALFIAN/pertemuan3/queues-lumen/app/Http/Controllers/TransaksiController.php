<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\JobDataku;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari pengguna (sesuai kebutuhan)
        $validator = Validator::make($request->all(), [
            'penggunas_pengguna_id' => 'required|integer',
            'produks_produk_id' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Buat transaksi baru
        $transaksi = Transaksi::create([
            'penggunas_pengguna_id' => $request->penggunas_pengguna_id,
            'produks_produk_id' => $request->produks_produk_id,
            'keterangan' => $request->keterangan,
        ]);

        // Panggil fungsi untuk mengurangi stok produk terkait
        $this->kurangiStokProduk($transaksi);

        return response()->json(['message' => 'Transaksi berhasil.']);

    }

    private function kurangiStokProduk(Transaksi $transaksi)
    {
        $produk = $transaksi->Produk;
        $produk->stok -= 1; // Sesuaikan dengan jumlah terjual atau aturan bisnis lainnya
        $produk->save();
    }
}
