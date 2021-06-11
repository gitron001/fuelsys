<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'date',
        'user_id',
        'company_id',
        'paid',
        'status',
    ];

    public function getDateFormat(){
        return 'U';
    }

    public function user(){
        return $this->belongsTo('App\Models\Users')->withDefault([
            'name' => ''
        ]);
    }

    public function company(){
        return $this->belongsTo('App\Models\Company')->withDefault([
            'name' => ''
        ]);
    }
}
