<?php

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Produk;
use App\Http\Controllers\C_Warung;
use App\Http\Controllers\C_Karyawan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Pencatatan;

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

Route::get('/', [C_Home::class, 'index'])->middleware('auth');
Route::get('/chart', [C_Home::class, 'chart'])->middleware('auth');

Route::get('/login', [C_Auth::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [C_Auth::class, 'login']);
Route::post('/logout', [C_Auth::class, 'logout']);

Route::get('/karyawan', [C_Karyawan::class, 'index'])->middleware('auth');
Route::post('/karyawan/tambah', [C_Karyawan::class, 'tambah'])->middleware('auth');
Route::post('/karyawan/hapus', [C_Karyawan::class, 'hapus'])->middleware('auth');
Route::post('/karyawan/edit', [C_Karyawan::class, 'edit'])->middleware('auth');

Route::get('/warung', [C_Warung::class, 'index'])->middleware('auth');
Route::post('/warung/tambah', [C_Warung::class, 'tambah'])->middleware('auth');
Route::post('/warung/hapus', [C_Warung::class, 'hapus'])->middleware('auth');
Route::post('/warung/edit', [C_Warung::class, 'edit'])->middleware('auth');

Route::get('/pencatatan/{id_warung}/{tahun}/{bulan}', [C_Pencatatan::class, 'index'])->middleware('auth');
Route::post('/pencatatan/{id_warung}/{tahun}/{bulan}/tambah', [C_Pencatatan::class, 'tambah'])->middleware('auth');
Route::post('/pencatatan/{id_warung}/{tahun}/{bulan}/edit', [C_Pencatatan::class, 'edit'])->middleware('auth');
Route::post('/pencatatan/{id_warung}/{tahun}/{bulan}/hapus', [C_Pencatatan::class, 'hapus'])->middleware('auth');

Route::get('/produk', [C_Produk::class, 'index'])->middleware('auth');

Route::get('/dp', function(){
    return view('datepicker');
});

Route::get('/pdp', function(){
    return view('pencatatan_dp');
});