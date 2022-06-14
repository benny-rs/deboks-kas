<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Warung;

class C_Warung extends Controller
{
    //
    public function index(){
        return view('v_warung', [
            "data" => M_Warung::all()
        ]);
    }

    public function tambah(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);
        // return $request->all();
        // return $validatedData;
        M_Warung::create($validatedData);
        
        return view('v_update_warung', [
            "data" => M_Warung::get()
        ]);
    }

    public function hapus(Request $request){
        M_Warung::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_warung', [
            "data" => M_Warung::get()
        ]);
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);
        // return $request->all();
        // return $validatedData;
        M_Warung::where('id', $request->id)->update($validatedData);
        
        return view('v_update_warung', [
            "data" => M_Warung::get()
        ]);
    }
}
