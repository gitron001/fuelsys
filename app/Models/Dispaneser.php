<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispaneser extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }
}
