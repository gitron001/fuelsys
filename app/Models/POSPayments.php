<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class POSPayments extends Model
{
    protected $table = 'pos_payments';

    protected $fillable = [
        'date',
        'bank_id',
        'amount',
        'created_by',
        'edited_by',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
