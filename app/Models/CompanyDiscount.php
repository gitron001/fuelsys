<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDiscount extends Model
{
    //
	protected $table = 'company_discounts';

    protected $fillable = [
        'company_id', 
        'product_id',
        'discount', 
    ];

    public function getDateFormat(){
        return 'U';
    }
}
