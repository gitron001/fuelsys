<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $fillable = [
        'name',  
        'product_id',
        'capacity',
        'status',
    ];
}
