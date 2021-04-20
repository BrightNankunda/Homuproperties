<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, softDeletes;
    protected $dates = ['deleted_at'];

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
    public function getAccessNumberAttribute() {
        return 'AN ' . $value;
    }
    public function setMonthsPaidAttribute($value) {
        $this->attributes['monthsPaid'] = strtolower($value);
    }
}
