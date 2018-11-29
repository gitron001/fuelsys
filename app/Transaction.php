<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'status', 
        'locker', 
        'sl_no',
        'tn_no',
        'sts',
        'price',
        'lit',
        'money',
        'ctot',
        'mtot',
        '~status',
        'card',
        'ctype',
        'method',
        'bill_no',
    ];

    public function dispaneser(){
        return $this->belongsTo('App\Dispaneser');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
