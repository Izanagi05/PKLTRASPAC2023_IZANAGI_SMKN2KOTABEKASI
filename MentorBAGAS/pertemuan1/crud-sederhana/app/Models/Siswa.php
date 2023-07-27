<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $primaryKey='siswa_id';
    // protected $hidden='siswa_id';
    protected $fillable = ['nama','nis','alamat', 'lahir','kelas_id'];


}
