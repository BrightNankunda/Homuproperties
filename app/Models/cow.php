<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cow extends Model
{
    use HasFactory;

    public function owncs() {
        return $this->belongsToMany(owncs::class);
    }
    // public function methods()
    // {
    //     return $this->hasOne('App\Models\methods');
    // }
}
