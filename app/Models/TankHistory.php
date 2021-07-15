<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TankHistory extends Model
{
    protected $table = 'tank_history';

    protected $fillable = [
        'name',
        'shift_id',
        'product_id',
        'capacity',
        'status',
        'alarm_email_water_level',
        'high_level_water',
        'date',
    ];
}
