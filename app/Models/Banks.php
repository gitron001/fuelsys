<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = 'banks';

    protected $fillable = [
        'name',
        'bank_number',
        'status'
    ];

    public function getDateFormat(){
        return 'U';
    }
}
