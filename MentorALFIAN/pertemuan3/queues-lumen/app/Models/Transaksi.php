<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table='transaksis';
    protected $primaryKey='transaksi_id';
    protected $fillable=['keterangan','penggunas_pengguna_id', 'produks_produk_id'];

    public function Produk(){
        return $this->belongsTo('App\Models\Produk', 'produks_produk_id', 'produk_id');
   }
} 
