<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarungController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/karyawan', [KaryawanController::class, 'lihat'])->middleware('auth');
Route::post('/karyawan/tambah', [KaryawanController::class, 'tambah'])->middleware('auth');
Route::post('/karyawan/hapus', [KaryawanController::class, 'hapus'])->middleware('auth');
Route::post('/karyawan/edit', [KaryawanController::class, 'edit'])->middleware('auth');

Route::get('/warung', [WarungController::class, 'index'])->middleware('auth');

Route::get('/pencatatan/{id_warung}/{tahun}/{bulan}', [PencatatanController::class, 'index'])->middleware('auth');

Route::get('/dp', function(){
    return view('datepicker');
});

Route::get('/pdp', function(){
    return view('pencatatan_dp');
});