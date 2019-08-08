<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bonus_request extends Model
{
    protected $table = 'bonus_request';
    
    protected $fillable = [
        'id', 
        'pfc_id', 
        'channel_id',
        'user_id',
        'created_at',
        'updated_at', 
    ];
	
	public function getDateFormat(){
        return 'U';
    }
}
