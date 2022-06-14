<?php

namespace App\Http\Controllers;

use App\Models\M_Warung;
use App\Models\M_Pencatatan;
use Illuminate\Http\Request;

class C_Pencatatan extends Controller
{
    //
    // public function index(M_Warung $warung){
    //     return view('pencatatan', [
    //         // "id" => $id,
    //         "data" => $warung,
    //     ]);
    // }
    public function index($id_warung, $tahun, $bulan){
        return view('v_pencatatan', [
            "warung" => M_Warung::find($id_warung),
            "data" => M_Pencatatan::where('id_warung',$id_warung)->whereMonth('created_at', $bulan)->whereYear('created_at',$tahun)->get()
        ]);
    }

    public function tambah(Request $request, $id_warung, $tahun, $bulan){
        $validatedData = $request->validate([
            'minggu_ke' => 'required',
            'produk_terbeli' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required'
        ]);
        // return $request->all();
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['id_warung'] = $id_warung;
        // return $validatedData;
        M_Pencatatan::create($validatedData);
        
        return view('v_update_pencatatan', [
            "warung" => M_Warung::find($id_warung),
            "data" => M_Pencatatan::where('id_warung',$id_warung)->whereMonth('created_at', $bulan)->whereYear('created_at',$tahun)->get()
        ]);
    }

    public function hapus(Request $request, $id_warung, $tahun, $bulan){
        M_Pencatatan::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_pencatatan', [
            "warung" => M_Warung::find($id_warung),
            "data" => M_Pencatatan::where('id_warung',$id_warung)->whereMonth('created_at', $bulan)->whereYear('created_at',$tahun)->get()
        ]);
    }

    public function edit(Request $request, $id_warung, $tahun, $bulan){
        $validatedData = $request->validate([
            'minggu_ke' => 'required',
            'produk_terbeli' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required'
        ]);
        // return $request->all();
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['id_warung'] = $id_warung;
        // return $request->all();
        // return $validatedData;
        M_Pencatatan::where('id', $request->id)->update($validatedData);
        
        return view('v_update_pencatatan', [
            "warung" => M_Warung::find($id_warung),
            "data" => M_Pencatatan::where('id_warung',$id_warung)->whereMonth('created_at', $bulan)->whereYear('created_at',$tahun)->get()
        ]);
    }
}

// Query
// M_Pencatatan::where('id_warung',1)->whereMonth('created_at', 4)->whereYear('created_at',2022)->get();