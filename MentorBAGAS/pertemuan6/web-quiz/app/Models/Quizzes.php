<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quizzes extends Model
{
    use HasFactory;
    protected $table = 'quizzes';
    protected $primaryKey='id';
    protected $fillable = ['title', 'slug', 'dueration', 'category_id', 'is_paid', 'cost', 'validity', 'total_marks', 'having_negative_mark', 'negative_mark', 'pass_percentage', 'tags', 'publish_results_immediately', 'description', 'total_questions', 'instructions_page_id', 'start_date', 'end_date', 'record_updated_by', 'created_at', 'updated_at', 'show_in_front', 'exam_type', 'section_data', 'has_language', 'image', 'language_name', 'is_popular', 'package_id'];


    public function QuestionBankQuizzes(){
    // return $this->hasMany(QuestionBankQuizzes::class, 'quize_id');
    return $this->belongsToMany(QuestionBank::class, 'questionbank_quizzes', 'quize_id', 'questionbank_id')->withPivot(['marks','subject_id'])
    ->withTimestamps();
}
}
