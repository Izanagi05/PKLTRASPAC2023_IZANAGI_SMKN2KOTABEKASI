<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\JasaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware("auth")->group(function (){
    Route::get('/beranda', [PembayaranController::class, 'beranda'])->name('berandaku');
    // Route::get('/beranda/detail', [PembayaranController::class, 'detail']);
    Route::get('/beranda/detail/{slug}', [PembayaranController::class, 'show']);
    // Route::get('/beranda/detail/bayar', [PembayaranController::class, 'bayar']);
    Route::post('/beranda/bayar', [PembayaranController::class, 'bayar'])->name('checkout');
    Route::get('/beranda/bayar', [PembayaranController::class, 'viewbayar']);
    Route::get('/beranda/sukses', [PembayaranController::class, 'sukses'])->name('suksess');





    Route::get('/beranda/create', [JasaController::class, 'creaateview']);
    Route::post('/beranda/create/postplan', [JasaController::class, 'creaatePLanJasa']);
});
