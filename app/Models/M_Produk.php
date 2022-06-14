<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Produk extends Model
{
    protected $table = 'produks';
    use HasFactory;
    protected $guarded = ['id'];
}
