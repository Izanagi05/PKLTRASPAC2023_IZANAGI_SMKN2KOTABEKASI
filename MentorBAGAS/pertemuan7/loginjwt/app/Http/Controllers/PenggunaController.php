<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use App\Models\User;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }
    public function login(Request $request)
    {
        try {

            $pass =md5($request->password);
            $datadb =Pengguna::where('email', $request->email)->first();
            $credentials = $request->only('email', 'password');
            // dd($credentials);
            // dd($credentials);
            dd(Auth::attempt($credentials));
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            // if($pass === $datadb->password){
            //     // $passdb->remember_token=;
            //     // $token = Auth::attempt($credentials);
            //     // $datadb->remember_token=$token;
            // }
            return response()->json([
                'token' => $token,
                'data' => 'null',
                'message' => 'berhasil login',
                'success' => false
            ], 500);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'data' => null,
                'message' => 'Terjadi kesalahan: ' . $th,
                'success' => false
            ], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            //code...
            $validator = Validator::make($request->all(), [
                // 'nama' => 'required|string',
                'email' => 'required|string|unique',
                'password' => 'required|string',
            ]);
            if ($validator->fails()) {


                return response()->json([
                    'data' => null,
                    'message' => 'Gagal membuat',
                    'success' => false
                ]);
            }
            $allreq=$request->all();
            $allreq['password']=md5($request->password);
            $dataa = User::create($allreq);
            return response()->json([
                'dataa' => $dataa,
                'success' => true,
                'message' => 'berhasil register'

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'dataa' => null,
                'success' => 'Kesalahan' . $th,
                'message' => 'Gagal register'

            ]);
        }
    }
}
