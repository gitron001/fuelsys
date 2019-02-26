<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //	
    protected $fillable = [
        'name', 
        'fis_number', 
        'bis_number',
        'tax_number',
        'res_number',
        'tel_number',
        'email',
        'address',
        'city',
        'country',
        'type',
        'status',
        'limits',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function users(){
        return $this->hasMany('App\Models\Rfid');
    }
}
