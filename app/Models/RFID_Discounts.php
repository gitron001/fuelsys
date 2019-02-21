<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RFID_Discounts extends Model
{
	protected $table = 'rfid_discounts';

    protected $fillable = [
        'rfid_id', 
        'product_id',
        'discount', 
    ];

    public function product(){
        return $this->belongsTo('App\Models\Products');
    }
}
