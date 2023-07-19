<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\SkripsiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main.index');
})->middleware('auth');

// Route LOGIN
Route::get('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('login', [AuthController::class, 'authenticate']);

// Route REGISTER
Route::get('register', [AuthController::class, 'register'])->middleware('guest');
Route::post('register', [AuthController::class, 'registerProcess'])->middleware('guest');

// Route KELOLA SKRIPSI
Route::get('tabel-skripsi', [SkripsiController::class, 'index'])->middleware('auth');
Route::put('tabel-skripsi/tanggal-ujian/update/{skripsi}', [SkripsiController::class, 'editTglUjian'])->middleware('auth');


// Route BIODATA MHS
Route::get('biodata', [ManageUserController::class, 'editBiodata'])->middleware('auth');
Route::put('update-biodata/{user}', [ManageUserController::class, 'updateBiodata'])->middleware('auth');
// Route KELOLA USER
Route::get('data-mahasiswa', [ManageUserController::class, 'index'])->middleware('auth');
Route::get('data-mahasiswa/create', [ManageUserController::class, 'create'])->middleware('auth');
Route::get('data-mahasiswa/edit/{user}', [ManageUserController::class, 'edit'])->middleware('auth');
Route::put('data-mahasiswa/update/{user}', [ManageUserController::class, 'update'])->middleware('auth');
Route::post('data-mahasiswa/store', [ManageUserController::class, 'store'])->middleware('auth');
Route::delete('data-mahasiswa/destroy/{user}', [ManageUserController::class, 'destroy'])->middleware('auth');

// Route RESET PASSWORD
Route::get('reset-password/{user}', [ManageUserController::class, 'resetPassword'])->middleware('auth');
Route::get('/edit-biodata', function () {
    return view('main.edit-biodata');
});

// Route TIMELINE
Route::get('timeline', [SkripsiController::class, 'timeline'])->middleware('auth');
// ROUTE PENGJUAN JUDUL
Route::post('pengajuan-judul', [SkripsiController::class, 'pengajuanJudul'])->middleware('auth');
// Route UPLOAD DAN DOWNLOAD FILE PROPOSAL
Route::post('download-file-proposal/{skripsiMhs}', [SkripsiController::class, 'downloadProposal'])->middleware('auth');
Route::post('upload-file-proposal', [SkripsiController::class, 'uploadProposal'])->middleware('auth');
// Route UPLOAD DAN DOWNLOAD FILE HASIL
Route::post('download-file-hasil/{skripsiMhs}', [SkripsiController::class, 'downloadHasil'])->middleware('auth');
Route::post('upload-file-hasil', [SkripsiController::class, 'uploadHasil'])->middleware('auth');
// Route UPLOAD DAN DOWNLOAD FILE SKRIPSI
Route::post('download-file-skripsi/{skripsiMhs}', [SkripsiController::class, 'downloadSkripsi'])->middleware('auth');
Route::post('upload-file-skripsi', [SkripsiController::class, 'uploadSkripsi'])->middleware('auth');
