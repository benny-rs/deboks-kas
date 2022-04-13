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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/warung', [WarungController::class, 'index']);
Route::get('/pencatatan/{warung}', [PencatatanController::class, 'index']);