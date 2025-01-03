<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RFID_Limits extends Model
{
    protected $table = 'rfid_limits';

    protected $fillable = [
        'rfid_id', 
        'branch_id',
        'limit', 
    ];

    public function getDateFormat(){
        return 'U';
    }
    
    public function branch(){
        return $this->belongsTo('App\Models\Branch')->withDefault([
            'name' => '',
        ]);
    }
}
