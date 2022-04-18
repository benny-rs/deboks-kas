<?php

namespace App\Http\Controllers;

use App\Models\Warung;
use App\Models\Pencatatan;
use Illuminate\Http\Request;

class C_Pencatatan extends Controller
{
    //
    // public function index(Warung $warung){
    //     return view('pencatatan', [
    //         // "id" => $id,
    //         "data" => $warung,
    //     ]);
    // }
    public function index($id_warung, $tahun, $bulan){
        return view('v_pencatatan', [
            "warung" => Warung::find($id_warung),
            "data" => Pencatatan::where('id_warung',$id_warung)->whereMonth('created_at', $bulan)->whereYear('created_at',$tahun)->get()
        ]);
    }
}

// Query
// Pencatatan::where('id_warung',1)->whereMonth('created_at', 4)->whereYear('created_at',2022)->get();