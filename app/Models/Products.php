<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'name', 
        'price',
        'product_group_id',
        'vat',
        'status',
        'pfc_id',
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

    public function product_group(){
        return $this->belongsTo('App\Models\ProductGroup')->withDefault([
            'name' => '',
            'status' => 1,
        ]);
    }

    public function pfc(){
        return $this->belongsTo('App\Models\PFC');
    }
    
}
