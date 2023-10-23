<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionBank;
use App\Models\Quizzes;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Validator;

class QuestionBankController extends Controller
{


    public function getdata()
    {
        try {
            //code...
            $data = QuestionBank::get();
            foreach ($data as $key => $dt) {
                $data[$key]['quizzes'] = $dt->Quizzes;
            }
            return response()->json([
                'data' => $data,
                'message' => 'Berhasil ambil data',
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

    public function postquestionbank(Request $request)
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
            // $quizzespilihan=$quizzes_id;
            // $datacreate->Quizzes()->attach($quizzespilihan, ['marks'=>4, 'subject_id'=>1]);

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
    public function updatedata(Request $request)
    {
        try {
            $rules = [
                //     'subject_id' => 'required|string|exists:subjects,id',
                // 'topic_id' => 'required|string|exists:topics,id',
                // 'subject_id'=>'required|integer',
                // 'topic_id'=>'required|integer',
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

            $data = QuestionBank::findOrFail($request->id);
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
            $data->update($post);
            return response()->json([
                'data' => null,
                'message' => 'Berhasil ubah data',
                'success' => true,
                'status' => 201,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => null,
                'message' => $th,
                'success' => false,
                'status' => 400,
            ], 400);
        }
    }
    public function deletedata($id)
    {
        try {
            $data = QuestionBank::findOrFail($id);
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
