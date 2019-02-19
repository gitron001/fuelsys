<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $fillable = [
        'name',  
        'product_id',
        'capacity',
        'status',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
