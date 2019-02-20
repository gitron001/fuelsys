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
        return $this->belongsTo('App\Models\User');
    }

    public function discounts(){
        return $this->belongsTo('App\Models\RFID_Discounts');
    }

    public function limits(){
        return $this->belongsTo('App\Models\RFID_Limits');
    }
}
