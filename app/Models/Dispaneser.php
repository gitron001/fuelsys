<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispaneser extends Model
{
    protected $table = 'dispanesers';
    
    protected $fillable = [
        'name',
        'pfc_id', 
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


}
