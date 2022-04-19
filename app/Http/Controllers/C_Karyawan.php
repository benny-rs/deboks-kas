<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class C_Karyawan extends Controller
{
    //
    public function lihat(){
        return view('v_data_karyawan', [
            "data" => User::where('is_admin',false)->get()
        ]);
    }

    public function tambah(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:3',
            'nohp' => 'nullable',
            'alamat' => 'nullable'
        ]);
        // return $request->all();
        // return $validatedData;
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        
        return view('v_update_karyawan', [
            "data" => User::where('is_admin',false)->get()
        ]);
    }

    public function hapus(Request $request){
        User::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_karyawan', [
            "data" => User::where('is_admin',false)->get()
        ]);
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'username' => 'required',
            'password' => 'required|min:3',
            'nohp' => 'nullable',
            'alamat' => 'nullable'
        ]);
        // return $request->all();
        // return $validatedData;
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', $request->id)->update($validatedData);
        
        return view('v_update_karyawan', [
            "data" => User::where('is_admin',false)->get()
        ]);
    }
}