<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = [
        'tank_id',
        'amount',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
