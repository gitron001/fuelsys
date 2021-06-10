<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'date',
        'user_id',
        'paid',
        'status',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
