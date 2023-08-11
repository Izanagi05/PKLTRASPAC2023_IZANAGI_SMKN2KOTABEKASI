<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelass';
    protected $primaryKey='kelas_id';
    protected $fillable = ['nama_kelas'];

    public function Siswa()
    {
        return $this->hasMany('App\Models\Siswa', 'kelas_id', 'kelas_id');
    }



}
