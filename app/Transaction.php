<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'dispaneser_id', 
        'total', 
        'amount',
        'user_id',
    ];

    public function dispaneser(){
        return $this->belongsTo('App\Dispaneser');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
