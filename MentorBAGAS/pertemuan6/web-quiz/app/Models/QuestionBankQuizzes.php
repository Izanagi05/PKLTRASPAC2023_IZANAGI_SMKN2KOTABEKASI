<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionBankQuizzes extends Model
{
    use HasFactory;
        // protected $table = 'questionbank_quizzes';
        protected $primaryKey='id';
        // // protected $hidden='siswa_id';
        protected $fillable = ['questionbank_id','subject_id','quize_id','marks', 'created_at', 'updated_at'];


}
