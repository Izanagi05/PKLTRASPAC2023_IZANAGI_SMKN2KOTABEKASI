<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [SendMessageController::class, 'viewkumess']);
Route::get('/poll', [SendMessageController::class, 'viewkupoll']);
Route::get('/butt', [SendMessageController::class, 'viewkubutt']);
Route::get('/lok', [SendMessageController::class, 'viewkulok']);
Route::post('/kirim', [SendMessageController::class, 'sendmessage']);
Route::post('/kirim/poll', [SendMessageController::class, 'sendmessage']);
Route::post('/kirim/lok', [SendMessageController::class, 'sendmessage']);
Route::post('/kirim', [SendMessageController::class, 'sendmessage']);
Route::post('/kirim', [SendMessageController::class, 'sendmessage']);
// Route::get('/', [SendMessageController::class, 'teswebhook']);
