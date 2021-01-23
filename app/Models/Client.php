<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'clientName',
        'clientContact',
        'propertyName',
        'monthsPaid',
        'roomNumber',
        'accessNumber',
        'paid',
        'verified'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
