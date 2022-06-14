<?php

namespace App\Models;

use App\Models\M_User;
use App\Models\M_Warung;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Warung;

class M_Pencatatan extends Model
{
    protected $table = 'pencatatans';
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
    public function warung()
    {
        return $this->belongsTo(M_Warung::class, 'id_warung');
    }

    /**
     * Get the user that owns the Pencatatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(M_User::class, 'id_user');
    }
}
