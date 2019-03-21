<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    
    protected $fillable = [
        'date', 
        'amount',
        'company_id',
    ];

    public function getDateFormat(){
        return 'U';
    }
    
    public function company(){
    	return $this->belongsTo('App\Models\Company');
    }
}
