<?php

use Illuminate\Support\Facades\Route;
use App\Models\Warung;

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
    return view('home');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/karyawan', function(){
    return view('data_karyawan');
});

Route::get('/warung', function(){
    return view('data_warung', [
        "data" => Warung::all()
    ]);
});

Route::get('/pencatatan/{id}', function($id){
    return view('pencatatan', [
        "id" => $id,
        "nama" => Warung::find($id)
    ]);
});