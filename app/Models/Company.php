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
        'starting_balance',
        'tel_number',
        'contact_person',
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

<<<<<<< HEAD
    public function discounts(){
        return $this->hasMany('App\Models\CompanyDiscount', 'company_id', 'id');
=======
    public function payments(){
        return $this->hasMany('App\Models\Payments');
>>>>>>> 20ffde9691015b59fe2e15bd026588ea53becda1
    }
}
