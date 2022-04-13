<?php

namespace App\Models;

use App\Models\Warung;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Warung;

class Pencatatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function warung(){
    //     return this->belongsTo(Warung::class);
    // }

    /**
     * Get the warung that owns the Pencatatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warung(): BelongsTo
    {
        return $this->belongsTo(Warung::class, 'id_warung');
    }

    /**
     * Get the user that owns the Pencatatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
