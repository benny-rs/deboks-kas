<?php

namespace App\Models;

use App\Models\M_Pencatatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Warung extends Model
{
    protected $table = 'warungs';
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the pencatatan for the Warung
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pencatatan()
    {
        return $this->hasMany(M_Pencatatan::class, 'id_warung', 'id');
    }
}
