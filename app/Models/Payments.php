<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    
    protected $fillable = [
        'date', 
        'amount',
        'description',
        'company_id',
        'type',
        'branch_id',
    ];

    public function getDateFormat(){
        return 'U';
    }
    
    public function company(){
    	return $this->belongsTo('App\Models\Company')->withDefault([
            'name' => ''
        ]);
    }

    public function user(){
        return $this->belongsTo('App\Models\Users')->withDefault([
            'name' => ''
        ]);
    }
	
	public function paymentCreator(){
        return $this->belongsTo('App\Models\Users', 'created_by', 'id')->withDefault([
            'name' => ''
        ]);
    }

    public function paymentEditor(){
        return $this->belongsTo('App\Models\Users', 'edited_by', 'id')->withDefault([
            'name' => ''
        ]);
    }
}
