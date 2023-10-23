<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionBank;
use App\Models\Quizzes;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class QuestionBankQuizzesController extends Controller
{
    //question bank
    public function postquestionbankwitpivot(Request $request, $quizzes_id)
    {
        try {
            $rules = [
                //     'subject_id' => 'required|string|exists:subjects,id',
                // 'topic_id' => 'required|string|exists:topics,id',
                'subject_id'=>'required|integer',
                'topic_id'=>'required|integer',
                'question_tags'=>'required|string',
                'slug'=>'required|string',
                'question_type'=>'required|in:radio,checkbox,descriptive,blanks,match,para,video,audio',
                'question'=>'required|string',
                'question_file'=>'required|string',
                'question_file_is_url'=>'required|numeric',
                'total_answers'=>'required|numeric',
                'answers'=>'required|string',
                'total_correct_answers'=>'required|numeric',
                'correct_answers'=>'required|string',
                'marks'=>'required|numeric',
                'time_to_spend'=>'required|numeric',
                'difficulty_level'=>'required|in:easy,medium,hard',
                'hint'=>'required|string',
                'explanation'=>'required|string',
                'explanation_file'=>'required|string',
                'status'=>'required|numeric',
                'question_l2'=>'required|string',
                'explanation_l2'=>'required|string',
                'user_submitted'=>'required|string'
            ];
            $post = $request->all();
            $randomSlug =  Str::random(20);
            $rules['slug'] = $randomSlug;
            $post['slug'] = $randomSlug;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'message' => 'Validasi gagal',
                    'errors' => $errors,
                ], 400);
            }
            $datacreate = QuestionBank::create($post);
            // $dataa = QuestionBank::find($id);
            $quizzespilihan=$quizzes_id;
            $datacreate->Quizzes()->attach($quizzespilihan, ['marks'=>$request->marks, 'subject_id'=>18]);

            return response()->json([
                'data' => $datacreate,
                'message' => 'Berhasil tambah data',
                'success' => true,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
            return response()->json([
                'data' => null,
                'message' => $th,
                'success' => false,
                'status' => 400,
            ], 400);
        }
    }
    public function postpivotquestionbank(Request $request,$questionbank_id, $quizzes_id)
    {
        try {
            $rules = [
                //     'subject_id' => 'required|string|exists:subjects,id',
                // 'topic_id' => 'required|string|exists:topics,id',
                'subject_id'=>'required|integer',
                'topic_id'=>'required|integer',
                'question_tags'=>'required|string',
                'slug'=>'required|string',
                'question_type'=>'required|in:radio,checkbox,descriptive,blanks,match,para,video,audio',
                'question'=>'required|string',
                'question_file'=>'required|string',
                'question_file_is_url'=>'required|numeric',
                'total_answers'=>'required|numeric',
                'answers'=>'required|string',
                'total_correct_answers'=>'required|numeric',
                'correct_answers'=>'required|string',
                'marks'=>'required|numeric',
                'time_to_spend'=>'required|numeric',
                'difficulty_level'=>'required|in:easy,medium,hard',
                'hint'=>'required|string',
                'explanation'=>'required|string',
                'explanation_file'=>'required|string',
                'status'=>'required|numeric',
                'question_l2'=>'required|string',
                'explanation_l2'=>'required|string',
                'user_submitted'=>'required|string'
            ];
            $post = $request->all();
            $randomSlug =  Str::random(20);
            $rules['slug'] = $randomSlug;
            $post['slug'] = $randomSlug;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'message' => 'Validasi gagal',
                    'errors' => $errors,
                ], 400);
            }
            // $datacreate = QuestionBank::create($post);
            $dataa = QuestionBank::find($questionbank_id);
            $quizzespilihan=$quizzes_id;
            $dataa->Quizzes()->attach($quizzespilihan, ['marks'=>3, 'subject_id'=>1]);

            return response()->json([
                'data' => $dataa,
                'message' => 'Berhasil tambah data',
                'success' => true,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
            return response()->json([
                'data' => null,
                'message' => $th,
                'success' => false,
                'status' => 400,
            ], 400);
        }
    }
    public function deletepivotquestionbank($id)
    {
        try {
            $data = QuestionBank::findOrFail($id);
            $data->Quizzes()->detach();
            $data->delete();
            return response()->json([
                'data' => null,
                'message' => 'Berhasil delete data ',
                'success' => true,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'data' => null,
                'message' => $th,
                'success' => false,
                'status' => 400,
            ], 400);
        }
    }




    //quizzes
    public function postquizzeswitpivot(Request $request,$questionbank_id)
    {
        try {
            $rules = [
                'title' => 'required|string',
                'slug' => 'required|string',
                'dueration' => 'required|numeric',
                'category_id' => 'required|numeric',
                'is_paid' => 'required|numeric',
                'cost' => 'required|numeric',
                'validity' => 'required|numeric',
                'total_marks' => 'required|numeric',
                'having_negative_mark' => 'required|numeric',
                'negative_mark' => 'required|numeric',
                'pass_percentage' => 'required|numeric',
                'tags' => 'required|string',
                'publish_results_immediately' => 'required|numeric',
                'description' => 'required|string',
                'total_questions' => 'required|numeric',
                'instructions_page_id' => 'required|numeric',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'record_updated_by' => 'required|numeric',
                'show_in_front' => 'required|numeric',
                'exam_type' => 'required|string',
                'section_data' => 'required|string',
                'has_language' => 'required|numeric',
                'image' => 'required|string',
                'language_name' => 'required|string',
                'is_popular' => 'required|numeric',
                'package_id' => 'required|string'
            ];
            $post = $request->all();
            $randomSlug = strtolower(str_replace(' ', '-', $post['title'])) . '-' . Str::random(20);
            $rules['slug'] = $randomSlug;
            $post['slug'] = $randomSlug;

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'message' => 'Validasi gagal',
                    'errors' => $errors,
                ], 400);
            }
            // $dataa = Quizzes::create($post);
            $datacreate = Quizzes::create($post);
            $questionbankpilihan=$questionbank_id;
            $datacreate->QuestionBankQuizzes()->attach($questionbankpilihan, ['marks'=>3, 'subject_id'=>1]);
            return response()->json([
                'data' => null,
                'message' => 'Berhasil tambah data',
                'success' => true,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'data' => null,
                'message' => $th,
                'success' => false,
                'status' => 400,
            ], 400);
        }
    }
    public function postpivotquizzez(Request $request,$quizzes_id,$questionbank_id )
    {
        try {

            $datacreate = Quizzes::find($quizzes_id);
            $questionbankpilihan=$questionbank_id;
            $datacreate->QuestionBankQuizzes()->attach($questionbankpilihan, ['marks'=>3, 'subject_id'=>1]);
            return response()->json([
                'data' => null,
                'message' => 'Berhasil tambah data',
                'success' => true,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'data' => null,
                'message' => $th,
                'success' => false,
                'status' => 400,
            ], 400);
        }
    }
    public function deletepivotquizes($id)
    {
        try {
            $data = Quizzes::findOrFail($id);
            $data->QuestionBankQuizzes()->detach();
            $data->delete();
            return response()->json([
                'data' => null,
                'message' => 'Berhasil delete data ',
                'success' => true,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'data' => null,
                'message' => $th,
                'success' => false,
                'status' => 400,
            ], 400);
        }
    }
}
