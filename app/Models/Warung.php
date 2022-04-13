<?php

namespace App\Models;

use App\Models\Pencatatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warung extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the pencatatan for the Warung
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pencatatan()
    {
        return $this->hasMany(Pencatatan::class, 'id_warung', 'id');
    }
}
