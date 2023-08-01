<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $primaryKey='siswa_id';
    // protected $hidden='siswa_id';
    protected $fillable = ['nama','nis','alamat', 'lahir','kelas_id'];

    public function Kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kelas_id');
    }
}
