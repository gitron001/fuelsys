<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispaneser extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
}
