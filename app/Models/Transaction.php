<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transactions';
    
    protected $fillable = [
        'status', 
        'locker', 
        'tr_no',
        'sl_no',
        'product_id',
        'dis_status',
        'price',
        'lit',
        'money',
        'dis_tot',
        'pfc_tot',
        'tr_status',
        'rfid_id',
        'ctype',
        'method',
        'bill_no',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function dispaneser(){
        return $this->belongsTo('App\Models\Dispaneser');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function rfid(){
        return $this->belongsTo('App\Models\Rfid');
    }

    public function product(){
        return $this->belongsTo('App\Models\Products');
    }
}
