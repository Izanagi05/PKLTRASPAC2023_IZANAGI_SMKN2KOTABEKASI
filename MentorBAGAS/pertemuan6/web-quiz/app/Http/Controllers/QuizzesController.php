<?php

namespace App\Http\Controllers;

use App\Models\QuestionBank;
use App\Models\Quizzes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class QuizzesController extends Controller

{

    public function getdata()
    {
        try {
            $data = Quizzes::get();
            $quizData = [];
            foreach ($data as $key => $dt) {
                $questtionData = [];
                foreach ($dt->QuestionBankQuizzes as $key => $value) {
                    $questtionData[] = [
                        # code...
                        'id' => $value->id,
                        'question' =>strip_tags($value->question),
                        'published_at' => Carbon::parse($value->created_at)->format('d-M-Y'),
                        'choices' => json_decode($value->answers),
                    ];
                }

                $quizData[] = [
                    'quiz_title' => strip_tags($dt->title),
                    'quiz_duration' => strip_tags($dt->dueration),
                    'question_data' => $questtionData,

                ];
                // $data[$key]['question_bank_quizzes'] = $dt->QuestionBankQuizzes;

            }
            // $responku=response()->json([
            //     'quiz_tittle'=>$data['title'],
            //     'quiz_duraction'=>$data['dueration'],
            //     // 'question_data'=>$data['question_bank_quizzes']
            // ]);
            return response()->json([
                'data' => $quizData,
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

    public function postdata(Request $request)
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
            $dataa = Quizzes::create($post);
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
    public function updatedata(Request $request)
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
            //code...
            $data = Quizzes::findOrFail($request->id);
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
            $data->update($post);
            return response()->json([
                'data' => null,
                'message' => 'Berhasil ubah data',
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
    public function deletedata($id,$idquestbank)
    // public function deletedata($id)
    {
        try {
            $questtion=QuestionBank::find($idquestbank);
            $data = Quizzes::findOrFail($id);
            $questtion->QuestionBankQuizzes()->detach($id) ;
            $data->delete();
            return response()->json([
                'data' => null,
                'message' => 'Berhasil hapus data ',
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
