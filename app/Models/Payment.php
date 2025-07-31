<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'card_number',
        'card_name',
        'expiry_date',
        'cvv'
    ];

    protected $hidden = [
        //
    ];
}
