<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bright extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'age'];

    public function laptop() {
        return $this->hasMany('App\Models\Laptop');
    }
}
