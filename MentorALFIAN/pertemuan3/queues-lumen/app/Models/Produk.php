<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table='produks';
    protected $primaryKey='produk_id';
    protected $fillable=['nama', 'stok'];


    public function Kategori(){
        return $this->belongsTo('App\Models\Kategori', 'kategoris_kategori_id');
   }
}
