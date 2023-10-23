<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BisnisController;

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


Route::get('/', [BisnisController::class, 'home']);
Route::post('/post', [BisnisController::class, 'import']);
