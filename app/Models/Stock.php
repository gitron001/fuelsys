<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [
        'tank_id',
        'amount',
        'reference_number',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function tank(){
        return $this->belongsTo('App\Models\Tank');
    }
}
