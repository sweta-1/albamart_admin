<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vender extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'phone',
        'address',
        'city',
        'country',
        'state',
        'pin_code',
    ];
}


