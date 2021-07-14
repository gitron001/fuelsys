<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispaneser extends Model
{
    protected $table = 'dispanesers';

    protected $fillable = [
        'name',
        'pfc_id', 
		'channel_id',
        'cardreader_status',
        'price_division', 
        'lit_division', 
        'money_division', 
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }

    public function pfc(){
        return $this->belongsTo('App\Models\PFC');
    }

    public function user(){
        return $this->belongsTo('App\Models\Users', 'current_user_id', 'id')->withDefault([
            'name' => ''
        ]);
    }
}
