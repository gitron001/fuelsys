<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $table = 'tanks';

    protected $fillable = [
        'name',
        'product_id',
        'capacity',
        'status',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function product(){
        return $this->belongsTo('App\Models\Products');
    }
}
