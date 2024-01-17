<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MpkController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\MenfessController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminJurnalController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminEkskulController;
use App\Http\Controllers\AdminPendOSISController;
use App\Http\Controllers\AdminPendMPKController;
use App\Http\Controllers\AdminMenfessController;
use App\Http\Controllers\AdminOSISController;
use App\Http\Controllers\AdminDivOSISController;
use App\Http\Controllers\AdminMemOSISController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminMPKController;
use App\Http\Controllers\AdminDivMPKController;
use App\Http\Controllers\AdminMemMPKController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/web', [HomeController::class, 'web']);

// pendaftar
Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/', [PendaftaranController::class, 'store']);

//OSIS
Route::get('/osis', [OsisController::class, 'index']);
Route::get('/osis/{divisi:slug}', [OsisController::class, 'show']);
Route::get('/jurnal', [JurnalController::class, 'index']);
Route::get('/jurnal/{data:slug}', [JurnalController::class, 'show']);
Route::get('/berita', [NewsController::class,'index']);
Route::get('/berita/{data:slug}', [NewsController::class,'show']);

//MPK
Route::get('/mpk', [MpkController::class, 'index']);
Route::get('/mpk/{divisi:slug}', [MpkController::class, 'show']);
Route::get('/menfess', [MenfessController::class, 'show']);
Route::get('/menfess/send', [MenfessController::class, 'index']);
Route::post('/menfess', [MenfessController::class, 'store']);
Route::get('/ekskul', [EkskulController::class,'index']);
Route::get('/ekskul/{data:slug}', [EkskulController::class,'show']);


// Route and Middleware (Auth)
Route::get('/login', [AdminController::class, 'login'])->middleware('guest');
Route::post('/login', [AdminController::class, 'authenticate']);
Route::post('/logout', [AdminController::class, 'logout']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

Route::middleware('osis')->group(function () {
    // Fitur OSIS
    Route::resource('/jurnal-admin', AdminJurnalController::class)->except('show');
    Route::resource('/berita-admin', AdminBeritaController::class)->except('show');
    Route::resource('/pendaftar-osis', AdminPendOSISController::class);
    Route::get('/pendaftar-osis/{pendaftar:id}/download', [AdminController::class, 'downloadOSIS']);
    
    // Profil OSIS
    Route::get('profil-osis/create-divisi', [AdminDivOSISController::class, 'create']);
    Route::post('profil-osis/store-divisi', [AdminDivOSISController::class, 'store']);
    Route::get('profil-osis/edit-divisi/{data:slug}', [AdminDivOSISController::class, 'edit']);
    Route::put('profil-osis/update-divisi/{data:slug}', [AdminDivOSISController::class, 'update']);
    Route::delete('profil-osis/destroy-divisi/{data:slug}', [AdminDivOSISController::class, 'destroy']);
    Route::resource('profil-osis', AdminOSISController::class)->except('show');
    Route::get('anggota-osis/{divisi:slug}', [AdminMemOSISController::class, 'index']);
    Route::post('anggota-osis/{divisi:slug}', [AdminMemOSISController::class, 'store']);
    Route::get('anggota-osis/{divisi:slug}/create', [AdminMemOSISController::class, 'create']);
    Route::get('anggota-osis/{divisi:slug}/{member:id}/edit', [AdminMemOSISController::class, 'edit']);
    Route::put('anggota-osis/{divisi:slug}/{member:id}', [AdminMemOSISController::class, 'update']);
    Route::delete('anggota-osis/{divisi:slug}/{member:id}', [AdminMemOSISController::class, 'destroy']);
    Route::get('event/{divisi:slug}', [AdminEventController::class, 'index']);
    Route::post('event/{divisi:slug}', [AdminEventController::class, 'store']);
    Route::get('event/{divisi:slug}/create', [AdminEventController::class, 'create']);
    Route::get('event/{divisi:slug}/{member:id}/edit', [AdminEventController::class, 'edit']);
    Route::put('event/{divisi:slug}/{member:id}', [AdminEventController::class, 'update']);
    Route::delete('event/{divisi:slug}/{member:id}', [AdminEventController::class, 'destroy']);
});

Route::middleware('mpk')->group(function () {
    // Fitur MPK
    Route::get('/pendaftar-mpk/{pendaftar:id}/download', [AdminController::class, 'downloadMPK']);
    Route::resource('/pendaftar-mpk', AdminPendMPKController::class);
    Route::get('/menfess-admin', [AdminMenfessController::class, 'index']);
    Route::get('/menfess-admin/{menfess:id}/accept', [AdminMenfessController::class, 'accept']);
    Route::get('/menfess-admin/{menfess:id}/terbaik', [AdminMenfessController::class, 'terbaik']);
    Route::delete('/menfess-admin/deleteAll', [AdminMenfessController::class, 'deleteAll'])->name('menfess-delete');
    Route::delete('/menfess-admin/{menfess:id}', [AdminMenfessController::class, 'destroy']);
    Route::resource('/ekskul-admin', AdminEkskulController::class)->except('show');

    // Profil MPK
    Route::get('profil-mpk/create-divisi', [AdminDivMPKController::class, 'create']);
    Route::post('profil-mpk/store-divisi', [AdminDivMPKController::class, 'store']);
    Route::get('profil-mpk/edit-divisi/{data:slug}', [AdminDivMPKController::class, 'edit']);
    Route::put('profil-mpk/update-divisi/{data:slug}', [AdminDivMPKController::class, 'update']);
    Route::delete('profil-mpk/destroy-divisi/{data:slug}', [AdminDivMPKController::class, 'destroy']);
    Route::resource('profil-mpk', AdminMPKController::class)->except('show');
    Route::get('anggota-mpk/{divisi:slug}', [AdminMemMPKController::class, 'index']);
    Route::post('anggota-mpk/{divisi:slug}', [AdminMemMPKController::class, 'store']);
    Route::get('anggota-mpk/{divisi:slug}/create', [AdminMemMPKController::class, 'create']);
    Route::get('anggota-mpk/{divisi:slug}/{member:id}/edit', [AdminMemMPKController::class, 'edit']);
    Route::put('anggota-mpk/{divisi:slug}/{member:id}', [AdminMemMPKController::class, 'update']);
    Route::delete('anggota-mpk/{divisi:slug}/{member:id}', [AdminMemMPKController::class, 'destroy']);
});