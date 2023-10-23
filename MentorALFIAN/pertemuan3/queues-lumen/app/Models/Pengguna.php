<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table='penggunas';
    protected $primaryKey='pengguna_id';
    protected $fillable=['nama','username', 'password'];
        
    public function Transaksi(){
         return $this->hasMany('App\Models\Transaksi', 'penggunas_pengguna_id', 'pengguna_id');
    }
   
}
