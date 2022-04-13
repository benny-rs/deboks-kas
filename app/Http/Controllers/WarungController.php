<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warung;

class WarungController extends Controller
{
    //
    public function index(){
        return view('data_warung', [
            "data" => Warung::all()
        ]);
    }
}
