<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warung;

class PencatatanController extends Controller
{
    //
    public function index(Warung $warung){
        return view('pencatatan', [
            // "id" => $id,
            "nama" => $warung->nama
        ]);
    }
}
