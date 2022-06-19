<?php

namespace App\Http\Controllers;

use App\Models\M_Warung;
use App\Models\M_Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Home extends Controller
{
    //
    public function index(){
        $pencatatan_total = M_Pencatatan::get();
        $pencatatan_bulanini = M_Pencatatan::whereMonth('created_at', idate('m'))->whereYear('created_at',idate('Y'))->get();
        // $id_warung_terlaris = M_Pencatatan::select("id_warung", DB::raw("sum(produk_terbeli) as total"))->groupBy("id_warung")->orderBy("total","desc")->first()->id_warung;
        // $warung = M_Warung::find($id_warung_terlaris);
        $warung = DB::table('warungs')
        ->select('warungs.*', DB::raw("sum(`pencatatans`.`produk_terbeli`) as total"))
        ->leftJoin('pencatatans','warungs.id','=','pencatatans.id_warung')
        ->groupBy('warungs.id')
        ->orderBy('total','desc')
        ->first();
        // $warung = DB::select("select `warungs`.*, sum(`pencatatans`.`produk_terbeli`) as total from `warungs` left join `pencatatans` on `warungs`.`id` = `pencatatans`.`id_warung` group by `warungs`.`id` order by `total` desc limit 1;");
        // dd($warung);
        return view('v_home', [
            "warung" => $warung,
            "pencatatan_total" => $pencatatan_total,
            "pencatatan_bulanini" => $pencatatan_bulanini
        ]);
    }

    public function chart(){
        // return M_Pencatatan::whereMonth('created_at', idate('m'))->pluck('produk_terbeli')->toArray();
        return M_Pencatatan::select(DB::raw("(sum(produk_terbeli)) as total_produk_terbeli"),DB::raw("(DATE_FORMAT(created_at, '%m')) as month"))->whereYear('created_at',idate('Y'))->orderBy('created_at')->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))->get();
    }
}
