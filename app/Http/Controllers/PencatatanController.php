<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warung;

class PencatatanController extends Controller
{
    //
    public function index($id){
        return view('pencatatan', [
            "id" => $id,
            "nama" => Warung::find($id)['nama']
        ]);
    }
}
