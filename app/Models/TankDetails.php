<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TankDetails extends Model
{
    protected $table = 'tank_details';

    protected $fillable = [
        'cm',
        'value',
        'tank_id',
        'status',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
