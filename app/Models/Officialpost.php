<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officialpost extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'official'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
