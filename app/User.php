<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = [
        'name',  
        'company_id',
        'email',
        'branch_id',
        'role',
        'one_time_limit',
        'plates',
        'car_id',
        'status',
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
}
