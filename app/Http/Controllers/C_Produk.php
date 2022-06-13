<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class C_Produk extends Controller
{
    //
    public function index(){
        return view('v_produk', [
            'data' => Produk::all()
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
        Produk::create($validatedData);
        
        return view('v_update_produk', [
            "data" => Produk::get()
        ]);
    }

    public function hapus(Request $request){
        if(Produk::find($request->id)->foto){
            Storage::delete(Produk::find($request->id)->foto);
        }
        Produk::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_produk', [
            "data" => Produk::get()
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
        Produk::where('id', $request->id)->update($validatedData);
        
        return view('v_update_produk', [
            "data" => Produk::get()
        ]);
    }
}
