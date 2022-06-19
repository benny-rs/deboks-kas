<?php

namespace App\Http\Controllers;

use App\Models\M_Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Warung extends Controller
{
    //
    public function index(){
        $warung = $warung = DB::table('warungs')
        ->select('warungs.*', DB::raw("sum(`pencatatans`.`produk_terbeli`) as total"))
        ->leftJoin('pencatatans','warungs.id','=','pencatatans.id_warung')
        ->groupBy('warungs.id')
        ->orderBy('total','desc')
        ->get();
        return view('v_warung', [
            "data" => $warung
        ]);
    }

    public function tambah(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);
        // return $request->all();
        // return $validatedData;
        M_Warung::create($validatedData);
        
        return view('v_update_warung', [
            "data" => M_Warung::get()
        ]);
    }

    public function hapus(Request $request){
        M_Warung::destroy($request->id);

        // return 'masuk hapus';
        return view('v_update_warung', [
            "data" => M_Warung::get()
        ]);
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);
        // return $request->all();
        // return $validatedData;
        M_Warung::where('id', $request->id)->update($validatedData);
        
        return view('v_update_warung', [
            "data" => M_Warung::get()
        ]);
    }
}
