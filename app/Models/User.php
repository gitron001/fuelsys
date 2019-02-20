<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = [
        'name',  
        'company_id',
        'email',
        'branch_id',
        'role_id',
        'one_time_limit',
        'plates',
        'car_id',
        'status',
    ];

    public function branch(){
        return $this->belongsTo('App\Models\Branch')->withDefault([
            'name' => '',
        ]);
    }

    public function role(){
        return $this->belongsTo('App\Models\Role')->withDefault([
            'name' => '',
        ]);
    }

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }

    public function rfid(){
        return $this->hasMany('App\Models\Rfid');
    }

}
