<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = ['bright_id','type', 'speed'];

    public function bright() {
        return $this->belongsTo('App\Models\Bright');
    }
}
