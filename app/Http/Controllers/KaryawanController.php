<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    //
    public function index(){
        return view('data_karyawan', [
            "data" => User::where('is_admin',false)->get()
        ]);
    }

    public function tambah(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:3',
            'nohp' => 'nullable',
            'alamat' => 'nullable'
        ]);
        // return $request->all();
        // return $validatedData;
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        
        return view('add_karyawan', [
            "data" => User::where('is_admin',false)->get()
        ]);
    }
}
