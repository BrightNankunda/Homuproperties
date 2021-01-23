<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'boss_id',
        'name',
        'type',
        'status',
        'astatus',
        'hstatus',
        'category',
        'location',
        'address',
        'street',
        'description',
        'rooms',
        'floor',
        'rent',
        'amount',
        'contact',
        'front',
        'image',
        'photo',
        'imageone',
        'imagetwo',
        'secret',
        'paid'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'boss_id');
    }
}
