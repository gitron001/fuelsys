<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetailsModel extends Model
{
    protected $table = 'invoice_details_models';

    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'price_without_tvsh',
        'tvsh',
        'price',
        'total',
    ];

    public function getDateFormat(){
        return 'U';
    }
}
