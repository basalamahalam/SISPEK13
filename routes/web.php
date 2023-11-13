<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\MenfessController;
use App\Http\Controllers\PendaftaranController;

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
    return view('home');
});

Route::get('/osis', function(){
    return view('about/osis');
});

Route::get('/mpk', function(){
    return view('about/mpk');
});

Route::get('/web', function (){
    return view('about/sejarah');
});

// pendaftar
Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/', [PendaftaranController::class, 'store']);

// Menfess as Guest
Route::get('/menfess', [MenfessController::class, 'show']);
Route::get('/menfess/send', [MenfessController::class, 'index']);
Route::post('/menfess', [MenfessController::class, 'store']);

// as a post
Route::get('/jurnal', [JurnalController::class, 'index']);
Route::get('/jurnal/{data:slug}', [JurnalController::class, 'show']);
Route::get('/berita', [NewsController::class,'index']);
Route::get('/berita/{data:slug}', [NewsController::class,'show']);
Route::get('/ekskul', [EkskulController::class,'index']);
Route::get('/ekskul/{data:slug}', [EkskulController::class,'show']);