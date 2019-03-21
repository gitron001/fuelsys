<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PFC extends Model
{
    protected $table = 'pfc_controller';

    protected $fillable = [
        'ip', 
        'name',
        'port', 
    ];

    public function getDateFormat(){
        return 'U';
    }
    
    public function dispanesers(){
        return $this->hasMany('App\Models\Dispaneser');
    }

    public function products(){
        return $this->hasMany('App\Models\Products');
    }

    public function transactions(){
        return $this->hasMany('App\Models\Transaction');
    }
}
