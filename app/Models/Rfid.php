<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rfid extends Model
{
    protected $fillable = [
        'rfid',
        'rfid_name',
        'user_id',
        'company_id',
        'one_time_limit',
        'plates',
        'vehicle',
        'created_at',
        'updated_at', 
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function company(){
        return $this->belongsTo('App\Models\Company')->withDefault([
            'name' => '',
            'status' => 1,
        ]);
    }

    public function user(){
        return $this->belongsTo('App\Models\User')->withDefault([
            'name' => '',
            'status' => 1,
        ]);
    }

    public function username(){
        return $this->hasMany('App\Models\Transaction', 'rfid_id', 'rfid');
    }

    public function discounts(){
        return $this->hasMany('App\Models\RFID_Discounts', 'rfid_id', 'id');
    }

    public function limits(){
        return $this->hasMany('App\Models\RFID_Limits', 'rfid_id', 'id');
    }
}
