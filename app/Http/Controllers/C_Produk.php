<?php

namespace App\Http\Controllers;

use App\Models\M_Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class C_Produk extends Controller
{
    //
    public function index(){
        return view('v_produk', [
            'data' => M_Produk::all()
        ]);
    }

    public function tambah(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kuantitas' => 'required',
            'foto' => 'nullable|image|file|max:2048'
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('images/foto_produk');
        }
        // return $request->all();
        // return $validatedData;
        M_Produk::create($validatedData);
        
        return view('v_update_produk', [
            "data" => M_Produk::get()
        ]);
    }

    public function hapus(Request $request){
        if(M_Produk::find($request->id)->foto){
            Storage::delete(M_Produk::find($request->id)->foto);
        }
        M_Produk::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_produk', [
            "data" => M_Produk::get()
        ]);
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kuantitas' => 'required',
            'foto' => 'nullable|image|file|max:2048'
        ]);

        if($request->file('foto')){
            if($request->foto_lama){
                Storage::delete($request->foto_lama);
            }
            $validatedData['foto'] = $request->file('foto')->store('images/foto_produk');
        }
        // return $request->all();
        // return $validatedData;
        M_Produk::where('id', $request->id)->update($validatedData);
        
        return view('v_update_produk', [
            "data" => M_Produk::get()
        ]);
    }
}
