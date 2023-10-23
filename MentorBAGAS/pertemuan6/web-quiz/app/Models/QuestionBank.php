<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionBank extends Model
{
    use HasFactory;

    protected $table = 'questionbank';
    protected $primaryKey='id';
    // protected $hidden='siswa_id';
    protected $fillable = ['subject_id','topic_id','question_tags', 'slug', 'question_type', 'question', 'question_file', 'question_file_is_url', 'total_answers', 'answers', 'total_correct_answers', 'correct_answers', 'marks', 'time_to_spend', 'difficulty_level', 'hint', 'explanation', 'explanation_file', 'status', 'created_at', 'updated_at', 'question_l2', 'explanation_l2', 'user_submitted'];
    public function Quizzes(){
        // return $this->hasMany(Quizzes::class, 'questionbank_quizzes', 'questionbank_id', 'quize_id');
        return $this->belongsToMany(Quizzes::class, 'questionbank_quizzes', 'questionbank_id', 'quize_id')->withPivot(['marks','subject_id'])
        ->withTimestamps();
    }
}
