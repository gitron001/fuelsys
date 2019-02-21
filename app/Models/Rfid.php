<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rfid extends Model
{
    protected $fillable = [
        'rfid',
        'user_id', 
    ];

    public function company(){
        return $this->belongsTo('App\Models\Company')->withDefault([
            'name' => '',
        ]);
    }

    public function user(){
        return $this->belongsTo('App\Models\User')->withDefault([
            'name' => '',
        ]);
    }

    public function discounts(){
        return $this->hasMany('App\Models\RFID_Discounts', 'rfid_id', 'id');
    }

    public function limits(){
        return $this->hasMany('App\Models\RFID_Limits', 'rfid_id', 'id');
    }
}
