<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name', 
        'address', 
        'city',
        'status',
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function rfid_limit(){
        return $this->hasMany('App\Models\RFID_Limits');
    }
}
