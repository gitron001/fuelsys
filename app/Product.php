<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'vat',
    ];

    public function tank(){
        return $this->hasMany('App\Tank');
    }
}
