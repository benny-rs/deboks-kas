<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

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
        ]);
        // return $request->all();
        // return $validatedData;
        Produk::create($validatedData);
        
        return view('v_update_produk', [
            "data" => Produk::get()
        ]);
    }

    public function hapus(Request $request){
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
        ]);
        // return $request->all();
        // return $validatedData;
        Produk::where('id', $request->id)->update($validatedData);
        
        return view('v_update_produk', [
            "data" => Produk::get()
        ]);
    }
}
