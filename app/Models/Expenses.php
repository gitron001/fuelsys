<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'pfc_id',
        'price_division',
        'lit_division',
        'money_division',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
