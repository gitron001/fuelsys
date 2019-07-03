<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $table = 'product_groups';

    protected $fillable = [
        'name', 
        'state_code',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function products(){
        return $this->hasMany('App\Models\Products');
    }
}
