<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    
    protected $fillable = [
        'status', 
        'locker', 
        'tr_no',
        'pfc_id',
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

    public function users(){
        return $this->belongsTo('App\Models\Users','user_id', 'id');
    }
    
    public function product(){
        return $this->belongsTo('App\Models\Products', 'product_id', 'pfc_pr_id');
    }

    public function pfc(){
        return $this->belongsTo('App\Models\PFC');
    }
}
