<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    protected $table = 'shifts';

    protected $fillable = [
        'start_date',
        'end_date',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
