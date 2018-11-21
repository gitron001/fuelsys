<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = [
        'name',  
        'company_id',
        'email',
        'b_id',
        'role',
        'one_time_limit',
        'plates',
        'car_id',
        'status',
    ];
}
