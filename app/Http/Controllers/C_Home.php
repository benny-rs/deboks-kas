<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
use Illuminate\Http\Request;

class C_Home extends Controller
{
    //
    public function index(){
        $pencatatan_total = Pencatatan::get();
        $pencatatan_bulanini = Pencatatan::whereMonth('created_at', idate('m'))->whereYear('created_at',idate('Y'))->get();
        return view('v_home', [
            "pencatatan_total" => $pencatatan_total,
            "pencatatan_bulanini" => $pencatatan_bulanini
        ]);
    }

    public function chart(){
        return Pencatatan::pluck('produk_terbeli')->toArray();
    }
}
