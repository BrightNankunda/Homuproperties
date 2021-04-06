<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'status', 'gender', 'preferredLocation', 'profileImage'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
