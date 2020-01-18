<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveTransaction extends Model
{
    protected $table = 'transactions_live';
    
    protected $fillable = [
        'status', 
        'error_flag', 
        'locker', 
        'tr_no',
        'receipt_no',
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
        'user_id',
        'ctype',
        'method',
        'bill_no',
        'test_user_id',
        'test_card_nr',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
