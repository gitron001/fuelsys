<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RFID_Product extends Model
{
	protected $table = 'r_f_i_d__products';

    protected $fillable = [
        'rfid_id', 
        'product_id',
        'discount', 
    ];
}
