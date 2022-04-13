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

    public function tambah(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:3',
            'nohp' => 'nullable',
            'alamat' => 'nullable'
        ]);
        // return $request->all();
        return $validated;
    }
}
