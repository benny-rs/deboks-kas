<?php

namespace App\Http\Controllers;

use App\Models\M_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class C_Karyawan extends Controller
{
    //
    public function index(){
        return view('v_karyawan', [
            "data" => M_User::where('is_admin',false)->get()
        ]);
    }

    public function tambah(Request $request){
        // return $request->file('foto_profil')->store('images/user-profile');
        // return $request->file('foto_profil');
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
            'nohp' => 'nullable',
            'alamat' => 'nullable',
            'foto_profil' => 'nullable|image|file|max:2048'
        ]);
        // return $request->all();
        // return $validatedData;
        if($request->file('foto_profil')){
            $validatedData['foto_profil'] = $request->file('foto_profil')->store('images/user-profile');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        M_User::create($validatedData);
        
        return view('v_update_karyawan', [
            "data" => M_User::where('is_admin',false)->get()
        ]);
    }

    public function hapus(Request $request){
        if(M_User::find($request->id)->foto_profil){
            Storage::delete(M_User::find($request->id)->foto_profil);
        }
        M_User::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_karyawan', [
            "data" => M_User::where('is_admin',false)->get()
        ]);
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'username' => 'required',
            'password' => 'nullable|min:5',
            'nohp' => 'nullable',
            'alamat' => 'nullable',
            'foto_profil' => 'nullable|image|file|max:2048'
        ]);
        if($request->file('foto_profil')){
            if($request->foto_profil_lama){
                Storage::delete($request->foto_profil_lama);
            }
            $validatedData['foto_profil'] = $request->file('foto_profil')->store('images/user-profile');
        }
        // return $request->all();
        // return $validatedData;
        if($request->password){
            $validatedData['password'] = Hash::make($validatedData['password']);
        }else{
            $validatedData['password'] = M_User::find($request->id)->password;
        };
        M_User::where('id', $request->id)->update($validatedData);
        
        return view('v_update_karyawan', [
            "data" => M_User::where('is_admin',false)->get()
        ]);
    }
}