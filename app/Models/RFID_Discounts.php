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

    public function getDateFormat(){
        return 'U';
    }
    
    public function product_details(){
        return $this->belongsTo('App\Models\Products', 'product_id', 'pfc_pr_id');  
    }

    public function rfid_details(){
        return $this->belongsTo('App\Models\Rfid', 'rfid_id', 'id');
    }

    

}
