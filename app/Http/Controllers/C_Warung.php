<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warung;

class C_Warung extends Controller
{
    //
    public function index(){
        return view('v_warung', [
            "data" => Warung::all()
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
        Warung::create($validatedData);
        
        return view('v_update_warung', [
            "data" => Warung::get()
        ]);
    }

    public function hapus(Request $request){
        Warung::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_warung', [
            "data" => Warung::get()
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
        Warung::where('id', $request->id)->update($validatedData);
        
        return view('v_update_warung', [
            "data" => Warung::get()
        ]);
    }
}
