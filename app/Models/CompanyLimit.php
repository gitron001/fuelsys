<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLimit extends Model
{
    //
    protected $table = 'company_limits';

    protected $fillable = [
        'company_id', 
        'branch_id',
        'limit', 
    ];
}
