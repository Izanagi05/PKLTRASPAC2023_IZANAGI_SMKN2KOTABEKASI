<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru_pelajaran';
    protected $primaryKey='guru_id';
    protected $fillable = ['nama'];


    // public function Pelajaran(){
    //     return $this->belongsToMany('App\Models\Siswa', 'pelajarana_pelajaran_id', 'guru_guru_id');
    // }
}
