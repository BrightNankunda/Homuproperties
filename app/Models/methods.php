<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class methods extends Model
{
    use HasFactory;

    protected $fillable = ['boss_id', 'mtn_no', 'airtel_no'];

    public function user()
    {
        return $this->belongsTo('App\Models\methods', 'boss_id');
    }
}
