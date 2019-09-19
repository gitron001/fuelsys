<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'rfid',
        'name',
        'surname',
        'residence',
        'contact_number',
        'application_date',
        'business_type',
        'email',
        'branch_user_id',
        'branch_id',
        'company_id',
        'one_time_limit',
        'plates',
        'vehicle',
        'exported',
        'status',
        'password',
        'starting_balance',
        'limits',
        'limit_left',
        'type',
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

    public function discounts(){
        return $this->hasMany('App\Models\RFID_Discounts', 'rfid_id', 'id');
    }

    public function limits(){
        return $this->hasMany('App\Models\RFID_Limits', 'rfid_id', 'id');
    }

    public function transactions(){
        return $this->hasMany('App\Models\Transaction','rfid_id', 'id');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payments');
    }

}
