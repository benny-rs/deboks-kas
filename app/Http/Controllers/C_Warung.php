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
}
