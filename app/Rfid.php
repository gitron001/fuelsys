<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfid extends Model
{
    protected $fillable = [
        'ffid', 
        'user_id', 
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
