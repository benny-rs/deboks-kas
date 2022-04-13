<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    //
    public function index(){
        return view('data_karyawan', [
            "data" => User::where('is_admin',false)->get()
        ]);
    }
}
