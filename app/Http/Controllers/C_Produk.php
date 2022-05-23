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
}
