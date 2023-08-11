<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    protected $table = 'pelajaranminats';
    protected $primaryKey='pelajaran_id';
    protected $fillable = ['nama_pelajaran'];

    public function Siswa(){
        return $this->belongsToMany('App\Models\Siswa','pelajaranmurids', 'pelajaran_pelajaran_id','murids_murid_id' );
    }
}
