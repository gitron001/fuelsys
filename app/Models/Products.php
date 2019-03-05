<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'vat',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function tank(){
        return $this->hasMany('App\Models\Tank');
    }

    public function rfid_discount(){
        return $this->hasMany('App\Models\RFID_Discounts');
    }

    public function transaction_product(){
        return $this->hasMany('App\Models\Transaction');
    }    
}
