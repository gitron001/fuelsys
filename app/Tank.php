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

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
