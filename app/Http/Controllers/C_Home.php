<?php

namespace App\Http\Controllers;

use App\Models\Warung;
use App\Models\Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Home extends Controller
{
    //
    public function index(){
        $pencatatan_total = Pencatatan::get();
        $pencatatan_bulanini = Pencatatan::whereMonth('created_at', idate('m'))->whereYear('created_at',idate('Y'))->get();
        $id_warung_terlaris = Pencatatan::select("id_warung", DB::raw("sum(produk_terbeli) as total"))->groupBy("id_warung")->orderBy("total","desc")->first()->id_warung;
        $warung = Warung::find($id_warung_terlaris);
        return view('v_home', [
            "warung" => $warung,
            "pencatatan_total" => $pencatatan_total,
            "pencatatan_bulanini" => $pencatatan_bulanini
        ]);
    }

    public function chart(){
        return Pencatatan::pluck('produk_terbeli')->toArray();
    }
}
