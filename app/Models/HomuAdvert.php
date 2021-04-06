<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomuAdvert extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'advert_header', 'advert_body', 'advert_image'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
