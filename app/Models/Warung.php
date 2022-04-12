<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

// class Warung extends Model
// {
//     use HasFactory;
// }

class Warung{
    private static $data = [
        [
            "id" => "1",
            "nama" => "Warung Aminah",
            "nohp" => "081234567890",
            "alamat" => "Jalan Raden Patah no 10 Kediri"
        ],
        [
            "id" => "2",
            "nama" => "Warung Paijo",
            "nohp" => "081234567890",
            "alamat" => "Jalan Siliwangi no 20 Padjajaran"
        ]
        ];
    
    public static function all(){
        return collect(self::$data);
    }

    public static function find($id){
        return static::all()->firstWhere('id', $id)['nama'];
    }
}