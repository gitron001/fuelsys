<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'dispanser_id', 
        'total', 
        'amount',
        'user_id',
    ];
}
